@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Daftar Produk</h4>

                <div class="flex flex-wrap items-end mb-2 gap-x-4">
                    <input type="text" name="search" id="search" placeholder="Search..." class="px-4 rounded-lg">
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-600">Berdasarkan</span>
                        <select name="search_by" id="search_by" class="rounded-lg">
                            <option value="regional">Regional</option>
                            <option value="branch">Branch</option>
                            <option value="cluster">Cluster</option>
                            <option value="tap">TAP</option>
                            <option value="nama">Nama</option>
                            <option value="telp">Telp</option>
                            <option value="role">Role</option>
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
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Harga</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Bahan</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">TAP</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Nama</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Telp</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Digipos</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Reff Orbit</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Link Aja</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Role</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Status</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-200">
                                <td class="p-3 font-bold text-gray-700 border-b"></td>
                            </tr>
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
