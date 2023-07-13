@extends('layouts.dashboard.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="w-full mx-4">
        <div class="flex flex-col">
            <div class="mt-4">
                <div class="flex items-center gap-x-3 ">
                    <a href="{{ url()->previous() }}"
                        class="inline-block px-4 py-2 font-bold text-white transition-all rounded-md bg-secondary-300 hover:bg-secondary-400">
                        <i class="mr-2 fa-solid fa-arrow-left"></i> Kembali
                    </a>
                    <h4 class="text-xl font-bold text-gray-600 align-baseline">Detail Pesanan</h4>
                    <a href="https://wa.me/62{{ $order->receiver_phone }}" target="_blank"
                        class="block p-2 my-1 text-base font-semibold text-white transition-all bg-green-600 rounded whitespace-nowrap hover:bg-green-800">Hubungi
                        Pembeli</a>
                    <button
                        class="block p-2 my-1 text-base font-semibold text-left text-white transition-all bg-orange-600 rounded whitespace-nowrap hover:bg-orange-800 btn-status"
                        data-id="{{ $order->id }}" status="{{ $order->status }}">
                        Ubah Status
                    </button>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div
                        class="w-full px-2 py-4 mt-4 overflow-auto bg-white rounded-md shadow sm:px-6 col-span-full sm:col-span-1 sm:mx-0">
                        <div>
                            <div class="flex flex-col gap-2 my-3">
                                <span class="text-lg font-bold">Pembeli</span>
                                <table class="w-full border-2 rounded-md">
                                    <tr>
                                        <td class="p-2 font-semibold border">Nama Pengguna</td>
                                        <td class="p-2 border">{{ $order->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Nama Pembeli</td>
                                        <td class="p-2 border">{{ $order->receiver_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Telepon Pembeli</td>
                                        <td class="p-2 border">{{ $order->receiver_phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Alamat Pembeli</td>
                                        <td class="p-2 border">{{ $order->receiver_province }} |
                                            {{ $order->receiver_city }} | {{ $order->receiver_address }} |
                                            {{ $order->receiver_zip_code }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="flex flex-col gap-2 my-3">
                                <span class="text-lg font-bold">Pesanan</span>
                                <table class="w-full border-2 rounded-md">
                                    <tr>
                                        <td class="p-2 font-semibold border">Tanggal</td>
                                        <td class="p-2 border">{{ date('d-m-Y H:i', strtotime($order->created_at)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Jumlah Produk</td>
                                        <td class="p-2 border">{{ count($order->orderItem) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Metode Pengiriman</td>
                                        <td class="p-2 border">{{ $order->shipping_method ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Resi Pengiriman</td>
                                        <td class="p-2 border">{{ $order->shipping_receipt ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Subtotal</td>
                                        <td class="p-2 border">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Ongkir</td>
                                        <td class="p-2 border">Rp {{ number_format($order->shipping, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Total</td>
                                        <td class="p-2 border">Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Status</td>
                                        <td class="p-2 border">@include('components.payment-status', ['status' => $order->status])</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="flex flex-col gap-2 my-3">
                                <span class="text-lg font-bold">Pembayaran</span>
                                <table class="w-full border-2 rounded-md">
                                    <tr>
                                        <td class="p-2 font-semibold border">Nomor Pembayaran</td>
                                        <td class="p-2 border">{{ $order->payment->midtrans_booking_code }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Metode Pembayaran</td>
                                        <td class="p-2 border">{{ $order->payment->payment_method ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Resi Pengiriman</td>
                                        <td class="p-2 border">{{ $order->shipping_receipt ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Subtotal</td>
                                        <td class="p-2 border">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Ongkir</td>
                                        <td class="p-2 border">Rp {{ number_format($order->shipping, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Total</td>
                                        <td class="p-2 border">Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-semibold border">Status</td>
                                        <td class="p-2 border">@include('components.payment-status', ['status' => $order->status])</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full px-6 py-4 mt-4 overflow-auto bg-white rounded-md shadow col-span-full sm:col-span-1 sm:mx-0">
                        <h4 class="text-xl font-bold text-gray-600 align-baseline">Daftar Produk</h4>
                        <div class="flex flex-col w-full gap-4">
                            @foreach ($order->orderItem as $item)
                                <div class="flex px-3 py-2 bg-gray-100 rounded gap-x-2">
                                    <a href="{{ route('admin.product.show', $item->cart->product->id) }}" target="_blank"
                                        class="w-1/2 border cursor-pointer">
                                        <img src="{{ asset('storage/' . $item->cart->product->images[0]->image_url) }}"
                                            alt="{{ $item->cart->product->name }}"
                                            class="object-contain object-center w-full h-64">
                                    </a>
                                    <div class="w-1/2">
                                        <p class="text-lg font-bold transition-all cursor-pointer hover:text-secondary-400">
                                            <a href="{{ route('admin.product.show', $item->cart->product->id) }}"
                                                target="_blank">{{ $item->cart->product->name }}</a>
                                        </p>
                                        <p class="transition-all">
                                        <div class="flex items-center gap-x-1">
                                            <span>Warna : {{ $item->cart->color->name }}</span>
                                            <div class="w-4 h-4 border-2"
                                                style="background-color: {{ $item->cart->color->hex }}"></div>
                                        </div>
                                        </p>
                                        <p class=""><span>Ukuran : {{ $item->cart->size->name }}</span></p>
                                        <p class=""><span>Jumlah : {{ $item->cart->quantity }}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

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
            $('#capture').click(function() {
                $(".check").hide()
                $(".hadir").show()
                createPDF()
                $(".check").show()
                $(".hadir").hide()
            });

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
