@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Notifikasi</h4>

                <div class="overflow-auto bg-white rounded-md shadow w-fit">
                    <table class="overflow-auto text-left border-collapse w-fit">
                        <thead class="border-b">
                            <tr>
                                <th class="p-3 text-sm font-bold text-gray-100 uppercase bg-primary-600">No</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Waktu</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Pesan</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notif as $key => $data)
                                <tr class="hover:bg-gray-200">
                                    <td class="p-3 font-bold text-gray-700">{{ $key + $notif->firstItem() }}</td>
                                    <td class="p-3 text-gray-700 whitespace-nowrap tanggal">
                                        {{ date('d-m-Y H:i', strtotime($data->created_at)) }}</td>
                                    <td class="p-3 text-gray-700 message">{{ $data->message }}</td>
                                    <td class="p-3 text-gray-700">
                                        <a href="{{ route('admin.order.show', $data->order_id) }}"
                                            class="block my-1 text-base font-semibold text-indigo-600 transition whitespace-nowrap hover:text-indigo-800">Lihat
                                            Pesanan</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $notif->links('components.pagination', ['data' => $notif]) }}
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

        })
    </script>
@endsection
