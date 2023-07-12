@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="px-6 py-8">
        <span class="text-3xl font-bold text-secondary-700">Pesanan Saya</span>
    </div>
    <div class="flex flex-col w-full gap-3 px-1 bg-gray-100">
        <div class="w-full bg-white rounded">
            <div class="py-8 border-t md:flex items-strech md:py-10 lg:py-8 border-gray-50">
                <div class="w-full md:w-4/12 2xl:w-1/4">
                    <img src="{{ asset('storage/' . $cart->product->images[0]->image_url) }}" alt="{{ $cart->product->name }}"
                        class="object-cover object-center w-3/4 mx-auto h-52 md:mx-0 md:w-full md:block" />
                </div>
                <div class="flex flex-col justify-center gap-y-4 md:pl-3 md:w-8/12 2xl:w-3/4">
                    <div class="flex items-center w-full pt-1">
                        <a href="{{ route('browse.show', $cart->product->id) }}"
                            class="text-base font-black leading-none text-gray-800 transition-all hover:text-primary-600">{{ $cart->product->name }}
                        </a>
                    </div>
                    <p class="pt-2 text-xs leading-3 text-gray-600">Bahan: {{ $cart->product->material }}</p>
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs leading-3 text-gray-600">Warna:
                            {{ $cart->color->name }}
                        </p>
                        <div class="inline-block w-3 h-3 border border-gray-400"
                            style="background-color: {{ $cart->color->hex }}">
                        </div>
                    </div>
                    <p class="text-xs leading-3 text-gray-600 w-96">Ukuran: {{ $cart->size->name }}
                    </p>
                    <p class="text-xs font-semibold leading-3 text-gray-600 w-96">Jumlah: {{ $cart->quantity }}
                    </p>
                    <div class="flex items-center justify-between pt-3">
                        <div class="flex itemms-center">
                            <form action="{{ route('cart.destroy', $cart->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="text-xs leading-3 text-red-500 underline cursor-pointer">Remove</button>
                            </form>
                        </div>
                        <p class="text-base font-black leading-none text-gray-800">
                            Rp {{ number_format($cart->product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {})
    </script>
@endsection
