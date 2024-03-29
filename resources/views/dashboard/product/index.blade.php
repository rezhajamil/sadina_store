@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Daftar Produk</h4>

                <div class="flex flex-wrap items-end my-2 gap-4">
                    <input type="text" name="search" id="search" placeholder="Search..." class="px-4 rounded-lg">
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-600">Berdasarkan</span>
                        <select name="search_by" id="search_by" class="rounded-lg">
                            <option value="nama">Nama</option>
                            <option value="kategori">Kategori</option>
                            <option value="bahan">Bahan</option>
                            <option value="harga">Harga</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-600">Status</span>
                        <select name="filter_status" id="filter_status" class="rounded-lg">
                            <option value="">All</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                {{-- <span class="inline-block mt-6 mb-2 text-lg font-semibold text-gray-600">Direct Sales By Region</span> --}}
                <a href="{{ route('admin.product.create') }}"
                    class="inline-block px-4 py-2 my-2 font-bold text-white transition-all rounded-md bg-secondary-500 hover:bg-secondary-700"><i
                        class="mr-2 fa-solid fa-plus"></i> Data Produk Baru</a>

                <div class="overflow-auto bg-white rounded-md shadow w-fit">
                    <table class="overflow-auto text-left border-collapse w-fit">
                        <thead class="border-b">
                            <tr>
                                <th class="p-3 text-sm font-bold text-gray-100 uppercase bg-primary-600">No</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Nama</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Kategori</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Harga</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Bahan</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Deskripsi</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Status</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr class="hover:bg-gray-200">
                                    <td class="p-3 font-bold text-gray-700 border-b">{{ $key + 1 }}</td>
                                    <td class="p-3 font-bold text-gray-700 nama">{{ $product->name }}</td>
                                    <td class="p-3 font-bold text-gray-700 kategori">{{ $product->category->name }}</td>
                                    <td class="p-3 font-bold text-gray-700 harga">
                                        {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="p-3 font-bold text-gray-700 bahan">{{ $product->material }}</td>
                                    <td class="p-3 text-gray-700 deskripsi">{!! $product->description !!}</td>
                                    <td class="p-3 font-bold text-gray-700 status">
                                        @if ($product->status)
                                            <div
                                                class="flex items-center justify-center px-3 py-1 rounded-full bg-green-200/50">
                                                <span class="text-sm font-semibold text-green-900 status">Aktif</span>
                                            </div>
                                        @else
                                            <div
                                                class="flex items-center justify-center px-3 py-1 rounded-full bg-red-200/50">
                                                <span
                                                    class="text-sm font-semibold text-red-900 whitespace-nowrap status">Tidak
                                                    Aktif</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="p-3 text-gray-700">
                                        <a href="{{ route('admin.product.show', $product->id) }}"
                                            class="block my-1 text-base font-semibold text-teal-600 transition hover:text-teal-800">Lihat
                                            Detail</a>
                                        <a href="{{ route('admin.product.edit', $product->id) }}"
                                            class="block my-1 text-base font-semibold text-indigo-600 transition hover:text-indigo-800">Edit</a>
                                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="block my-1 text-base font-semibold text-left text-red-600 transition hover:text-red-800 whitespace-nowrap">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#search").on("input", function() {
                find();
            });

            $("#search_by").on("input", function() {
                find();
            });

            $("#filter_status").on("input", function() {
                filter_status();
            });

            const find = () => {
                let search = $("#search").val();
                let searchBy = $('#search_by').val();
                let pattern = new RegExp(search, "i");
                $(`.${searchBy}`).each(function() {
                    let label = $(this).text();
                    if (pattern.test(label)) {
                        $(this).parent().show();
                    } else {
                        $(this).parent().hide();
                    }
                });
            }

            const filter_status = () => {
                let filter_status = $('#filter_status').val();
                $(`.status`).each(function() {
                    let label = $(this).text();
                    if (filter_status == '') {
                        $(this).parent().parent().parent().show();
                    } else {
                        if (filter_status == label) {
                            $(this).parent().parent().parent().show();
                        } else {
                            $(this).parent().parent().parent().hide();
                        }
                    }
                });

            }
        })
    </script>
@endsection
