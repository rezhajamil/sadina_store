@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="px-4 py-6 my-2">
        <a href="{{ url()->previous() }}"
            class="px-4 py-2 transition-all border-2 rounded-full hover:bg-secondary-800 hover:text-white border-secondary-800"><i
                class="mr-2 fa-solid fa-arrow-left"></i>Kembali
        </a>
    </div>
    <div class="flex flex-col w-full px-4 pt-4 pb-3 bg-white rounded gap-y-4">
        <div class="flex justify-between">
            <span class="text-sm text-gray-500">{{ date('d-m-Y', strtotime($order->created_at)) }}</span>
            @include('components.payment-status', ['status' => $order->status])
        </div>
        <div class="grid grid-cols-1 gap-4 xl:grid-cols-3">
            @foreach ($order->orderItem as $item)
                <div class="flex justify-between gap-2 border border-t rounded items-strech">
                    <div class="w-2/5 border rounded md:w-1/3 xl:w-1/2">
                        <img src="{{ asset('storage/' . $item->cart->product->images[0]->image_url) }}"
                            alt="{{ $item->cart->product->name }}"
                            class="object-cover object-center w-full rounded h-96 sm:h-[450px] md:mx-0 md:w-full md:block" />
                    </div>
                    <div class="flex flex-col justify-center px-3 py-1 gap-y-2">
                        <a href="{{ route('browse.show', $item->cart->product->id) }}"
                            class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Nama</span>
                            <span class="">:</span>
                            <span class="">{{ $item->cart->product->name }}</span>
                        </a>
                        <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Warna</span>
                            <span class="">:</span>
                            <span class="">{{ $item->cart->color->name }}</span>
                        </div>
                        <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Ukuran</span>
                            <span class="">:</span>
                            <span class="">{{ $item->cart->size->name }}</span>
                        </div>
                        <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Jumlah Produk</span>
                            <span class="">:</span>
                            <span class="">{{ $item->cart->quantity }}</span>
                        </div>
                        <div class="flex text-sm text-gray-600 sm:text-lg gap-x-2">
                            <span class="">Harga</span>
                            <span class="">:</span>
                            <span class="">Rp. {{ number_format($item->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div
            class="flex flex-col flex-wrap justify-between gap-2 pt-2 border-t-2 border-t-secondary-600 sm:items-center sm:flex-row">
            <div class="flex flex-col sm:flex-row gap-x-2 gap-y-2">
                <a href="https://wa.me/62{{ $admin->whatsapp }}" target="_blank"
                    class="px-3 py-2 text-sm font-semibold text-center transition-all bg-transparent border rounded sm:text-left sm:text-base text-emerald-600 border-emerald-600 hover:text-white hover:bg-emerald-600">Hubungi
                    Penjual</a>
                @if ($order->status == 'waiting')
                    <a href="{{ $order->payment->midtrans_url }}"
                        class="px-3 py-2 text-sm font-semibold text-center text-white transition-all bg-indigo-600 border rounded sm:text-left sm:text-base hover:bg-indigo-800">Bayar
                        Pesanan</a>
                    <form action="{{ route('order.change_status', $order->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="cancel">
                        <button type="submit"
                            class="w-full px-3 py-2 text-sm font-semibold text-center text-white transition-all bg-red-600 border rounded sm:text-left sm:text-base hover:bg-red-800">Batalkan
                            Pesanan</button>
                    </form>
                @endif
            </div>
            <div class="space-x-4 text-base font-bold text-left sm:text-xl text-secondary-600">
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
