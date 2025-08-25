<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductTag;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at')->orderBy('name')->with(['category'])->get();
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::orderBy('name')->get();
        $colors = Color::orderBy('hex')->get();
        $sizes = Size::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('dashboard.product.create', compact('categories', 'colors', 'sizes', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->file('image'));
        $request->validate([
            'name' => ['required', 'string'],
            'category' => ['required'],
            'description' => ['string', 'nullable'],
            'price' => ['string', 'numeric'],
            'material' => ['required', 'string'],
            'weight' => ['required', 'numeric'],
            'color' => ['required'],
            'size' => ['required'],
            'tag' => ['required'],
            'image' => ['required', 'max:4096'],
            // 'cover' => ['required'],
        ]);

        // if ($request->image) {
        //     # code...
        //     // ddd($request->image);
        // } else {
        //     ddd('a');
        // }

        $product = Product::create([
            'name' => ucfirst($request->name),
            'category_id' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'material' => ucwords($request->material),
            'weight' => $request->weight,
        ]);

        if ($product) {
            foreach ($request->color as $key => $color) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                ]);
            }

            foreach ($request->size as $key => $size) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size_id' => $size,
                ]);
            }

            foreach ($request->tag as $key => $tag) {
                ProductTag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag,
                ]);
            }

            if ($request->image) {
                foreach ($request->file('image') as $key => $image) {
                    $url = $image->store("product_images/$product->id");
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => $url,
                        'is_cover' => $key == 0 ? 1 : 0,
                    ]);
                }
            }
        }

        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::where('id', $product->id)->with(['colors.color', 'sizes.size', 'tags.tag', 'images'])->first();

        return view('dashboard.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::where('id', $product->id)->with(['colors.color', 'sizes.size', 'tags.tag', 'images'])->first();
        $categories = ProductCategory::orderBy('name')->get();
        $colors = Color::orderBy('hex')->get();
        $sizes = Size::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        $product_colors = [];
        $product_sizes = [];
        $product_tags = [];

        foreach ($product->colors as $key => $color) {
            array_push($product_colors, $color->color_id);
        }

        foreach ($product->sizes as $key => $size) {
            array_push($product_sizes, $size->size_id);
        }

        foreach ($product->tags as $key => $tag) {
            array_push($product_tags, $tag->tag_id);
        }

        return view('dashboard.product.edit', compact('categories', 'colors', 'sizes', 'tags', 'product_colors', 'product_sizes', 'product_tags', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'category' => ['required'],
            'description' => ['string', 'nullable'],
            'price' => ['string', 'numeric'],
            'material' => ['required', 'string'],
            'weight' => ['required', 'numeric'],
            'color' => ['required'],
            'size' => ['required'],
            'tag' => ['required'],
        ]);

        if ($request->delete_image) {
            if (count($request->delete_image) >= count($product->images)) {
                $request->validate([
                    'image' => ['required', 'max:4096'],
                ]);
            }
        }

        $product->name = ucfirst($request->name);
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->material = ucwords($request->material);
        $product->weight = $request->weight;
        $product->save();

        ProductColor::where('product_id', $product->id)->delete();
        ProductSize::where('product_id', $product->id)->delete();
        ProductTag::where('product_id', $product->id)->delete();

        foreach ($request->color as $key => $color) {
            ProductColor::create([
                'product_id' => $product->id,
                'color_id' => $color,
            ]);
        }

        foreach ($request->size as $key => $size) {
            ProductSize::create([
                'product_id' => $product->id,
                'size_id' => $size,
            ]);
        }

        foreach ($request->tag as $key => $tag) {
            ProductTag::create([
                'product_id' => $product->id,
                'tag_id' => $tag,
            ]);
        }

        if ($request->delete_image) {
            foreach ($request->delete_image as $key => $image) {
                $data = ProductImage::find($image);

                ProductImage::where('id', $image)->delete();
                Storage::disk('public')->delete($data->image_url);
            }
        }

        if ($request->image) {
            foreach ($request->file('image') as $key => $image) {
                $url = $image->store("product_images/$product->id");
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $url,
                    'is_cover' => 0,
                ]);
            }
        }

        return redirect(route('admin.product.show', $product->id))->with('success', 'Berhasil Edit Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        ProductColor::where('product_id', $product->id)->delete();
        ProductSize::where('product_id', $product->id)->delete();
        ProductTag::where('product_id', $product->id)->delete();

        $images = ProductImage::where('product_id', $product->id)->get();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_url);
        }

        ProductImage::where('product_id', $product->id)->delete();

        $product->delete();

        return back();
    }

    public function changeCover(Request $request, Product $product)
    {
        ProductImage::where('product_id', $product->id)->update([
            'is_cover' => 0
        ]);

        ProductImage::where('id', $request->cover)->update([
            'is_cover' => 1
        ]);

        return back()->with('success', 'Berhasil mengubah cover');
    }
}
