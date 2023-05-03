<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->view->composer('layouts.app', function ($view) {
            $carts = Cart::with(['user', 'product.images', 'size', 'color'])->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->limit(5)->get();
            $cart_count = Cart::where('user_id', auth()->user()->id)->sum('quantity');
            // ddd($cart_count);
            $view->with('carts', $carts)->with('cart_count', $cart_count); // replace $carts with your actual data
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
