@extends('layouts.dashboard.app')
@section('body')
    <div class="w-full sm:mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <h4 class="text-xl font-bold text-gray-600 align-baseline">Daftar Pesanan</h4>

                <div class="flex flex-wrap items-end mb-2 gap-x-4">
                    <input type="text" name="search" id="search" placeholder="Search..." class="px-4 rounded-lg">
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-600">Berdasarkan</span>
                        <select name="search_by" id="search_by" class="rounded-lg">
                            <option value="nama">Nama</option>
                            <option value="telepon">Telepon</option>
                            <option value="bahan">Bahan</option>
                            <option value="resi">Resi</option>
                            <option value="harga">Harga</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-600">Status</span>
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

                <div class="flex justify-between my-4 ">
                    <form class="flex flex-wrap items-center gap-x-4 gap-y-2" action="{{ route('admin.order.index') }}"
                        method="get">
                        <input type="date" name="start_date" id="start_date" class="px-4 rounded-lg"
                            value="{{ request()->get('start_date') }}">
                        <span class="">s/d</span>
                        <input type="date" name="end_date" id="end_date" class="px-4 rounded-lg"
                            value="{{ request()->get('end_date') }}">
                        <div class="flex gap-x-3" id="buttons">
                            <button
                                class="px-4 py-2 font-bold text-white transition rounded-lg bg-secondary-600 hover:bg-secondary-800"><i
                                    class="mr-2 fa-solid fa-magnifying-glass"></i>Cari</button>
                            @if (request()->get('start_date') || request()->get('end_date'))
                                <a href="{{ route('admin.order.index') }}"
                                    class="px-4 py-2 font-bold text-white transition bg-gray-600 rounded-lg hover:bg-gray-800"><i
                                        class="mr-2 fa-solid fa-circle-xmark"></i>Reset</a>
                            @endif
                            <button
                                class="px-4 py-2 font-bold text-white transition rounded-lg bg-tertiary-600 hover:bg-tertiary-800"
                                id="btn-print"><i class="mr-2 fa-solid fa-file-pdf"></i>Laporan</button>
                        </div>
                    </form>
                </div>

                {{-- <a href="{{ route('admin.order.create') }}"
                    class="inline-block px-4 py-2 my-2 font-bold text-white transition-all rounded-md bg-secondary-500 hover:bg-secondary-700"><i
                        class="mr-2 fa-solid fa-plus"></i> Data Produk Baru</a> --}}

                <div class="overflow-auto bg-white rounded-md shadow w-fit" id="table-container">
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
                                <th class="p-3 text-sm font-medium text-gray-100 uppercase bg-primary-600 action">Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr class="hover:bg-gray-200">
                                    <td class="p-3 font-bold text-gray-700">{{ $key + $orders->firstItem() }}</td>
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
                                    <td class="p-3 text-gray-700 action">
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
                    {{ $orders->links('components.pagination', ['data' => $orders]) }}
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
    </script>
    <script>
        function createPDF() {
            var table = document.getElementById('table-container').innerHTML;
            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;
            // console.log({
            //     start_date,
            //     end_date
            // });

            var style = "<style>";
            style = style + "table {width: 100%;font: 17px Calibri;}";
            style = style + "table.resume, th.resume, td.resume {border: solid 1px #A7706E; border-collapse: collapse;}";
            style = style + "table, th, td {border: solid 1px #ccc; border-collapse: collapse;";
            style = style + "padding: 2px 3px;text-align: center;  margin-top:12px;}";
            style = style + "</style>";

            // CREATE A WINDOW OBJECT.
            var win = window.open('', '', 'height=700,width=700');

            win.document.write('<html><head> ');
            win.document.write(
                `<title>Daftar Pesanan</title>`
            ); // <title> FOR PDF HEADER.
            win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
            win.document.write('</head>');
            win.document.write('<body>');
            win.document.write(`<body><h4>Daftar Pesanan</h4>`);
            if (start_date) {
                win.document.write(
                `<span class='time'>Dari : ${start_date}</span>`); // THE TABLE CONTENTS INSIDE THE BODY TAG.
            }
            win.document.write('<br/>');
            if (end_date) {
                win.document.write(
                `<span class='time'>Sampai : ${end_date}</span>`); // THE TABLE CONTENTS INSIDE THE BODY TAG.
            }
            // win.document.write('<br style="margin-bottom:4px"/>');
            win.document.write(table);
            win.document.write('</body> </html > ');

            win.document.close(); // CLOSE THE CURRENT WINDOW.

            win.print(); // PRINT THE CONTENTS.
        }
    </script>
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

            $("#btn-print").on("click", function(event) {
                event.preventDefault();
                $(".action").hide();
                $(".pagination").hide();
                createPDF();
                $(".action").show();
                $(".pagination").show();
            })
        })
    </script>
@endsection
