<?php

namespace App\View\Components;

use App\Models\Cart;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $carts = Cart::with(['user', 'product', 'size', 'color'])->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('layouts.app', compact('carts'));
    }
}
