<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['user', 'payment', 'orderItem'])->where('user_id', auth()->user()->id)->paginate(10);
        $admin = User::where('email', 'admin@sadina.store')->first();

        return view('order.index', compact('orders', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $order = Order::with(['payment', 'orderItem.cart.product.images'])->find($id);
        $admin = User::where('email', 'admin@sadina.store')->first();
        // ddd($order);
        if ($request->notif) {
            $notif = Notification::find($request->notif);
            if (!$notif->is_read) {
                $notif->is_read = 1;
                $notif->save();
            }
        }

        return view('order.show', compact('order', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change_status(Request $request, Order $order)
    {
        $status = $request->status;
        // ddd([$status, $id]);
        $order->status = $status;
        $order->save();

        switch ($status) {
            case 'cancel':
                return back()->with('success', 'Pesanan Dibatalkan');
                break;
            default:
                return back()->with('success', 'Status Pesanan Diubah');
                break;
        }
    }
}
