@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="px-6 py-8">
        <span class="text-3xl font-bold text-secondary-700">Pesanan Saya</span>
    </div>
    <div class="flex flex-col w-full gap-3 px-2 bg-gray-100 gap-y-6">
        @foreach ($orders as $order)
            <div class="flex flex-col w-full px-4 pt-4 pb-3 mx-auto bg-white rounded sm:w-2/3 gap-y-4">
                <div class="flex justify-between">
                    <span class="text-sm text-gray-500">{{ date('d-m-Y', strtotime($order->created_at)) }}</span>
                    @include('components.payment-status', ['status' => $order->status])
                </div>
                <div class="flex gap-2 border-t items-strech border-gray-50">
                    <div class="border rounded w-fit">
                        <img src="{{ asset('storage/' . $order->orderItem[0]->cart->product->images[0]->image_url) }}"
                            alt="{{ $order->orderItem[0]->cart->product->name }}"
                            class="object-contain object-center w-full rounded h-52 md:h-72 md:mx-0 md:w-full md:block" />
                    </div>
                    <div class="flex flex-col justify-center py-1 gap-y-2">
                        <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Kode</span>
                            <span class="">:</span>
                            <span class="">{{ $order->payment_number ?? '-' }}</span>
                        </div>
                        @if ($order->shipping_receipt)
                            <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                                <span class="">No. Resi</span>
                                <span class="">:</span>
                                <span class="">{{ $order->shipping_receipt }}</span>
                            </div>
                        @endif
                        <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Jumlah Produk</span>
                            <span class="">:</span>
                            <span class="">{{ count($order->orderItem) }}</span>
                        </div>
                        <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Belanja</span>
                            <span class="">:</span>
                            <span class="">Rp. {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Ongkir</span>
                            <span class="">:</span>
                            <span class="">Rp. {{ number_format($order->shipping, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap items-center justify-between gap-2 pt-2 border-t-2">
                    <div class="flex gap-x-2">
                        @if ($order->status == 'waiting')
                            <a href="{{ $order->payment->midtrans_url }}"
                                class="px-3 py-2 text-sm font-semibold transition-all bg-transparent border rounded sm:text-base text-tertiary-600 border-tertiary-600 hover:text-white hover:bg-tertiary-600">Bayar
                                Pesanan</a>
                        @endif
                        <a href="{{ route('order.show', $order->id) }}"
                            class="px-3 py-2 text-sm font-semibold transition-all bg-transparent border rounded sm:text-base text-secondary-600 border-secondary-600 hover:text-white hover:bg-secondary-600">Detail
                            Pesanan
                        </a>
                    </div>
                    <div class="space-x-4 text-base font-bold sm:text-xl text-secondary-600">
                        <span class="">Total : </span>
                        <span class="">Rp. {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $orders->links('components.pagination', ['data' => $orders]) }}
@endsection
@section('script')
    <script>
        $(document).ready(function() {})
    </script>
@endsection
