<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'member')->count();
        $orders = Order::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $products = Product::count();

        return view('dashboard', compact('users', 'orders', 'products'));
    }
}
