@extends('layouts.dashboard.app')

@section('body')
    <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>
    <div class="mt-4">
        <div class="flex gap-3 -mx-6 flex-wrap ">
            <div class="w-full px-6 sm:w-1/2 xl:w-1/4">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="w-12 h-12 p-3 text-xl text-center bg-opacity-75 rounded-full bg-primary-600 aspect-square">
                        <i class="text-white fa-solid fa-users"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $users }}</h4>
                        <div class="text-gray-500">Pengguna</div>
                    </div>
                </div>
            </div>
            <div class="w-full px-6 sm:w-1/2 xl:w-1/4">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div
                        class="w-12 h-12 p-3 text-xl text-center bg-opacity-75 rounded-full bg-secondary-600 aspect-square">
                        <i class="text-white fa-solid fa-shirt"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $products }}</h4>
                        <div class="text-gray-500">Produk</div>
                    </div>
                </div>
            </div>
            <div class="w-full px-6 sm:w-1/2 xl:w-1/4">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="w-12 h-12 p-3 text-xl text-center bg-opacity-75 rounded-full bg-tertiary-600 aspect-square">
                        <i class="text-white fa-solid fa-bag-shopping"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $orders }}</h4>
                        <div class="text-gray-500">Pesanan Bulan Ini</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
