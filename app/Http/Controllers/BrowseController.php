<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use Illuminate\Http\Request;

class BrowseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->tag) {
            $products =
                Product::with(['category', 'colors.color', 'sizes.size', 'tags.tag', 'images'])
                ->whereHas('tags.tag', function ($query) use ($request) {
                    $query->where('name', $request->tag);
                });
        } else {
            $products = Product::with(['colors.color', 'sizes.size', 'tags.tag', 'images']);
        }

        if ($request->color) {
            $products->whereHas('colors.color', function ($query) use ($request) {
                $query->where('id', $request->color);
            });
        }

        if ($request->size) {
            $products->whereHas('sizes.size', function ($query) use ($request) {
                $query->where('id', $request->size);
            });
        }

        if ($request->category) {
            $products->whereIn('category_id', $request->category);
        }

        $products = $products->get();

        // ddd($products);

        $colors = Color::orderBy('hex')->get();
        $sizes = Size::orderBy('name')->get();
        $categories = ProductCategory::orderBy('name')->get();

        return view('browse.index', compact('products', 'colors', 'sizes', 'categories'));
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->with(['colors.color', 'sizes.size', 'tags.tag', 'images'])->first();

        // ddd($product->images);
        return view('browse.show', compact('product'));
    }
}
