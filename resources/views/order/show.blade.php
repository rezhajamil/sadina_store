@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="flex flex-col w-full px-4 pt-4 pb-3 bg-white rounded gap-y-4">
        <div class="flex justify-between">
            <span class="text-sm text-gray-500">{{ date('d-m-Y', strtotime($order->created_at)) }}</span>
            @include('components.payment-status', ['status' => $order->status])
        </div>
        <div class="flex gap-2 border-t items-strech border-gray-50">
            <div class="w-2/5 border rounded md:w-4/12 2xl:w-1/4">
                <img src="{{ asset('storage/' . $order->orderItem[0]->product->images[0]->image_url) }}"
                    alt="{{ $order->orderItem[0]->product->name }}"
                    class="object-cover object-center w-full rounded h-52 md:mx-0 md:w-full md:block" />
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
                <a
                    class="px-3 py-2 text-sm font-semibold transition-all bg-transparent border rounded sm:text-base text-emerald-600 border-emerald-600 hover:text-white hover:bg-emerald-600">Hubungi
                    Penjual</a>
                @if ($order->status == 'waiting')
                    <form action="{{ route('order.change_status', $order->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="cancel">
                        <button type="submit"
                            class="px-3 py-2 text-sm font-semibold text-white transition-all bg-red-600 border rounded sm:text-base hover:bg-red-800">Batalkan
                            Pesanan</button>
                    </form>
                @endif
            </div>
            <div class="space-x-4 text-base sm:text-xl text-secondary-600">
                <span class="">Total : </span>
                <span class="">Rp. {{ number_format($order->total_amount, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {})
    </script>
@endsection
