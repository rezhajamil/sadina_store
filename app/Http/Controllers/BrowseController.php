<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BrowseController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['colors.color', 'sizes.size', 'tags.tag', 'images'])->get();

        return view('browse.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->with(['colors.color', 'sizes.size', 'tags.tag', 'images'])->first();

        // ddd($product->images);
        return view('browse.show', compact('product'));
    }
}
