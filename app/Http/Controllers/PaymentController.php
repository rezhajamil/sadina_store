<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Midtrans;

class PaymentController extends Controller
{

    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Midtrans\Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // $payment = Payment::with(['user', 'order'])->find(1);
        // $payment->payment_method = 'qris';
        // $payment->save()
        // ddd($request);
        $request->validate([
            'name' => 'required|string',
            'phone' => ['required', 'numeric', 'starts_with:8'],
            'province' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'zip_code' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'shipping' => 'required|numeric',
            'shipping_method' => 'required|string',
            'total_amount' => 'required|numeric',
            'cost' => 'required|numeric',
        ]);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'receiver_name' => $request->name,
            'receiver_phone' => $request->phone,
            'receiver_province' => $request->province,
            'receiver_city' => $request->city,
            'receiver_address' => $request->address,
            'receiver_zip_code' => $request->zip_code,
            'subtotal' => $request->subtotal,
            'shipping' => $request->shipping,
            'shipping_method' => $request->shipping_method,
            'total_amount' => $request->total_amount,
            'status' => 'waiting',
        ]);

        Notification::create(
            [
                'user_id' => auth()->user()->id,
                'order_id' => $order->id,
                'target' => 'user',
                'message' => "Pesanan anda telah diterima. Silahkan lakukan pembayaran agar pesanan segera diproses."
            ],
        );

        Notification::create(
            [
                'user_id' => auth()->user()->id,
                'order_id' => $order->id,
                'target' => 'admin',
                'message' => auth()->user()->name . " telah melakukan pemesanan."
            ],
        );

        $carts = Cart::with(['user', 'product.images', 'product.category', 'product.colors', 'product.sizes', 'size', 'color'])->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();

        foreach ($carts as $key => $cart) {
            $order_items = OrderItem::create([
                'order_id' => $order->id,
                'cart_id' => $cart->id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);
        }

        $payment = Payment::create([
            'user_id' => auth()->user()->id,
            'order_id' => $order->id,
            'amount' => $order->total_amount,
        ]);

        Cart::where('user_id', auth()->user()->id)->update([
            'status' => 0,
        ]);

        $payment_url = $this->getSnapRedirect($payment);

        return redirect($payment_url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function getSnapRedirect(Payment $payment)
    {
        $orderId = 'SDN-' . $payment->id . '-' . random_int(100000, 999999);
        $amount = $payment->amount;

        $payment->midtrans_booking_code = $orderId;

        $transaction_details = [
            "order_id" => $orderId,
            "gross_amount" => $amount,
        ];

        $customer_details = [
            "first_name" => $payment->user->name,
            "email" => $payment->user->email,
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];

        try {
            $paymentUrl = Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $payment->midtrans_url = $paymentUrl;
            $payment->save();

            return $paymentUrl;
        } catch (Exception $e) {
            return $e;
            // ddd($e);
        }
    }

    public function midtransCallback(Request $request)
    {
        // ddd($request);
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);
        return 'haha';
        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        $payment_method = $notif->payment_type;

        $payment_id = explode('-', $notif->order_id)[1];
        $payment = Payment::with(['user', 'order'])->find($payment_id);
        $order = Order::find($payment->order_id);

        // ddd($payment);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $payment->payment_status = 'pending';
                $order->status = 'pending';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $payment->payment_status = 'paid';
                $order->status = 'paid';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $payment->payment_status = 'failed';
                $order->status = 'failed';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $payment->payment_status = 'failed';
                $order->status = 'failed';
            }
        } else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $payment->payment_status = 'failed';
            $order->status = 'failed';
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $payment->payment_status = 'paid';
            $order->status = 'paid';
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $payment->payment_status = 'pending';
            $order->status = 'pending';
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $payment->payment_status = 'failed';
            $order->status = 'failed';
        }

        $payment->payment_method = $payment_method;
        $order->payment_number = $notif->order_id;
        $payment->save();
        $order->save();

        Notification::create(
            [
                'user_id' => $payment->user->id,
                'order_id' => $order->id,
                'target' => 'user',
                'message' => "Pembayaran berhasil. Pesanan anda segera disiapkan oleh penjual."
            ],
        );

        Notification::create(
            [
                'user_id' => $payment->user->id,
                'order_id' => $order->id,
                'target' => 'admin',
                'message' => $payment->user->name . " telah membayar pesanan."
            ],
        );

        return redirect()->route('order.show', $order->id)->with('success', 'Pembayaran Berhasil');
    }
}
