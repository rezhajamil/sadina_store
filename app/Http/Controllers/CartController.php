<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['user', 'product.images', 'product.category', 'product.colors', 'product.sizes', 'size', 'color'])->where('user_id', auth()->user()->id)->where('status', 1)->orderBy('created_at', 'DESC')->get();
        $user = User::with(['address'])->find(auth()->user()->id);

        $categories = [];
        $province = [];
        $city = [];
        $total = 0;
        $weight = 0;
        $cost = 0;

        if (count($carts)) {
            foreach ($carts as $c => $cart) {
                if (!in_array($cart->product->category->name, $categories)) {
                    // ddd($cart->product->category->name);
                    array_push($categories, $cart->product->category->name);
                }
                $total += $cart->product->price;
                $weight += $cart->product->weight;
            }

            $request = Request::create(route('cart.index'), 'GET', [
                'destination' => $user->address->city_id,
                'provinceId' => $user->address->province_id,
                'weight' => $weight,
            ]);

            $province = RajaOngkirApiController::getListProvince();
            // $city = RajaOngkirApiController::getListCity($request);
            $cost = RajaOngkirApiController::getCost($request);
        } else {
            return redirect()->route('browse.index');
        }
        ddd($carts);

        // ddd($carts[0]->product);
        return view('cart.index', compact('carts', 'user', 'categories', 'total', 'weight', 'province', 'cost'));
    }

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
            ->where('status', 1)
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

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return back();
    }
}
