<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::with(['user', 'payment', 'orderItem']);

        if ($request->start_date) {
            $orders->where('created_at', '>=', date('Y-m-d 23:59:59', strtotime($request->start_date)));
        }

        if ($request->end_date) {
            $orders->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime($request->end_date)));
        }

        $orders = $orders->paginate(50);

        return view('dashboard.order.index', compact('orders'));
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
        $order = Order::with(['user', 'payment', 'orderItem.cart'])->find($id);
        // ddd($order->orderItem[0]->cart);
        if ($request->notif) {
            $notif = Notification::find($request->notif);
            if (!$notif->is_read) {
                $notif->is_read = 1;
                $notif->save();
            }
        }

        return view('dashboard.order.show', compact('order'));
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
            case 'waiting':
                $message = 'Pesanan anda telah diterima. Silahkan lakukan pembayaran agar pesanan segera diproses.';
                $success = 'Status Pesanan Diubah';
                break;
            case 'paid':
                $message = 'Pesanan anda telah berhasil dibayar.';
                $success = 'Status Pesanan Diubah';
                break;
            case 'prepare':
                $message = 'Pesanan anda sedang disiapkan oleh penjual.';
                $success = 'Status Pesanan Diubah';
                break;
            case 'deliver':
                $message = 'Pesanan anda sedang dikirim oleh jasa pengiriman.';
                $success = 'Status Pesanan Diubah';
                break;
            case 'deliver':
                $message = 'Pesanan anda sedang dikirim oleh jasa pengiriman.';
                $success = 'Status Pesanan Diubah';
                break;
            case 'cancel':
                $message = 'Pesanan anda telah dibatalkan.';
                $success = 'Pesanan Dibatalkan';
                break;
            case 'finish':
                $message = 'Pesanan anda telah selesai.';
                $success = 'Pesanan Selesai';
                break;
            default:
                $message = 'Status Pesanan anda telah berubah';
                $success = 'Status Pesanan Diubah';
                break;
        }

        Notification::create(
            [
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'target' => 'user',
                'message' => $message
            ],
        );

        return back()->with('success', $success);
    }
}
