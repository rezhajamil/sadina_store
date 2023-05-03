<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product' => ['required'],
            'size' => ['required'],
            'color' => ['required'],
        ]);

        $itemInCart = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product)
            ->where('size_id', $request->size)
            ->where('color_id', $request->color)
            ->first();

        if ($itemInCart) {
            Cart::where('user_id', Auth::user()->id)
                ->where('product_id', $request->product)
                ->where('size_id', $request->size)
                ->where('color_id', $request->color)
                ->update([
                    'quantity' => $itemInCart->quantity + 1
                ]);
        } else {
            $item = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product,
                'size_id' => $request->size,
                'color_id' => $request->color,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil Memasukkan Ke Keranjang Anda');
    }
}
