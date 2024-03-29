@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Daftar Pesanan oleh {{ $user->name }}</h4>

                <div class="flex flex-wrap items-end my-4 gap-x-4">
                    <div class="flex flex-col">
                        <span class="font-semibold text-gray-600">Cari Status</span>
                        <select name="filter_status" id="filter_status" class="rounded-lg">
                            <option value="">All</option>
                            <option value="waiting">Menunggu Pembayaran</option>
                            <option value="cancel">Batal</option>
                            <option value="paid">Dibayar</option>
                            <option value="prepare">Sedang Disiapkan</option>
                            <option value="deliver">Sedang Dikirim</option>
                            <option value="finish">Selesai</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-auto bg-white rounded-md shadow w-fit">
                    <table class="overflow-auto text-left border-collapse w-fit">
                        <thead class="border-b">
                            <tr>
                                <th class="p-3 text-sm font-bold text-gray-100 uppercase bg-primary-600">No</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Tanggal</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Nama Penerima
                                </th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Telp Penerima
                                </th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Total</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">No. Resi</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Status</th>
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->order as $key => $order)
                                <tr class="hover:bg-gray-200">
                                    <td class="p-3 font-bold text-gray-700">{{ $key + 1 }}</td>
                                    <td class="p-3 text-gray-700 whitespace-nowrap tanggal">
                                        {{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                    <td class="p-3 text-gray-700 nama">{{ $order->receiver_name }}</td>
                                    <td class="p-3 text-gray-700 telepon">{{ $order->receiver_phone }}</td>
                                    <td class="p-3 text-gray-700 total">
                                        {{ number_format($order->total_amount, 0, ',', '.') }}
                                    </td>
                                    <td class="p-3 text-gray-700 resi">{{ $order->shipping_receipt ?? '-' }}</td>
                                    <td class="p-3 text-gray-700">
                                        @include('components.payment-status', ['status' => $order->status])
                                    </td>
                                    <td class="p-3 text-gray-700">
                                        <a href="{{ route('admin.order.show', $order->id) }}"
                                            class="block my-1 text-base font-semibold text-indigo-600 transition whitespace-nowrap hover:text-indigo-800">Lihat
                                            Detail</a>
                                        <a href="https://wa.me/62{{ $order->receiver_phone }}" target="_blank"
                                            class="block my-1 text-base font-semibold text-green-600 transition whitespace-nowrap hover:text-green-800">Hubungi
                                            Pembeli</a>
                                        <button
                                            class="block my-1 text-base font-semibold text-left text-orange-600 transition whitespace-nowrap hover:text-orange-800 btn-status"
                                            data-id="{{ $order->id }}" status="{{ $order->status }}">
                                            Ubah Status
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center bg-black/50" id="modal-status" style="display: none">
        <div class="w-1/2 px-4 py-2 bg-white rounded-md">
            <form action="" method="post" class="flex flex-col items-center gap-y-2" id="form-status">
                @csrf
                @method('put')
                <select name="status" id="status" class="w-full rounded">
                    <option value="" selected disabled>Pilih Status</option>
                    <option value="waiting">Menunggu Pembayaran</option>
                    <option value="cancel">Batal</option>
                    <option value="paid">Dibayar</option>
                    <option value="prepare">Sedang Disiapkan</option>
                    <option value="deliver">Sedang Dikirim</option>
                    <option value="finish">Selesai</option>
                </select>
                {{-- <textarea class="w-full rounded" placeholder="Status" name="status"></textarea> --}}
                <button type="submit"
                    class="w-full px-3 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-800">Submit</button>
                <a class="w-full px-3 py-2 text-center text-white transition bg-red-600 rounded hover:bg-red-800"
                    id="cancel">Batal</a>
            </form>
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
                    let label = $(this).attr('status');
                    console.log(label);
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

            $(".btn-status").on("click", function() {
                let id = $(this).attr("data-id")
                let status = $(this).attr("status")
                let form = $("#form-status")
                $("#modal-status").show();
                form.attr('action', `{{ URL::to('/') }}/admin/order/change_status/${id}`)

                form.find(`option[value=${status}]`).attr('selected', true)
            })

            $("#cancel").on("click", function() {
                $("#modal-status").hide();
            })
        })
    </script>
@endsection
