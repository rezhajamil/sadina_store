@extends('layouts.app')
@section('body')
    {{-- <div class="absolute right-0 z-10 w-full h-full overflow-x-hidden transition duration-700 ease-in-out transform translate-x-0"
        id="checkout">
    </div> --}}
    <div class="grid items-end justify-end grid-cols-1 sm:grid-cols-2" id="cart">
        <div class="w-full h-auto px-4 py-4 overflow-x-hidden overflow-y-hidden bg-white lg:px-8 lg:py-14 md:px-6 md:py-8 lg:min-h-screen"
            id="scroll">
            @foreach ($categories as $category)
                <p class="pt-3 text-3xl font-black leading-10 text-gray-800 lg:text-4xl">{{ $category }}</p>
                @foreach ($carts as $i_cart => $cart)
                    @if ($cart->product->category->name == $category)
                        <div class="py-8 border-t md:flex items-strech md:py-10 lg:py-8 border-gray-50">
                            <div class="w-full md:w-4/12 2xl:w-1/4">
                                <img src="{{ asset('storage/' . $cart->product->images[0]->image_url) }}"
                                    alt="{{ $cart->product->name }}"
                                    class="object-cover object-center w-3/4 mx-auto h-52 md:mx-0 md:w-full md:block" />
                                {{-- <img src="https://i.ibb.co/g9xsdCM/Rectangle-37.pngg" alt="Black Leather Bag"
                            class="object-cover object-center w-full h-full md:hidden" /> --}}
                            </div>
                            <div class="flex flex-col justify-center gap-y-4 md:pl-3 md:w-8/12 2xl:w-3/4">
                                <div class="flex items-center justify-between w-full pt-1">
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
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="w-full h-full bg-gray-200">
            <form action="{{ route('checkout.store') }}" method="POST"
                class="flex flex-col justify-between h-auto px-4 py-6 overflow-y-auto lg:h-screen lg:px-8 md:px-7 lg:py-20 md:py-10">
                @csrf
                <div>
                    <p class="text-3xl font-black leading-9 text-gray-800 lg:text-4xl">Summary</p>
                    <div class="grid grid-cols-2 gap-3 mt-4">
                        <span class="font-semibold col-span-full">Kirim Ke</span>
                        <input type="text" class="px-2 py-2" value="{{ $user->name }}" placeholder="Nama Penerima"
                            required>
                        <input type="number" class="px-2 py-2" value="{{ $user->whatsapp ?? $user->phone }}"
                            placeholder="Kontak Penerima" required>
                        <select name="province" id="province">
                            <option value="" selected disabled province_id>Pilih Provinsi</option>
                            @foreach ($province as $data)
                                <option value="{{ $data->province_id }}" province_id={{ $data->province_id }}
                                    {{ $data->province_id == $user->address->province_id ? 'selected' : '' }}>
                                    {{ $data->province }}
                                </option>
                            @endforeach
                        </select>
                        <select name="city" id="city">
                            <option value="" selected disabled city_id>Pilih Kota</option>
                            @foreach ($city as $data)
                                <option value="{{ $data->city_id }}" city_id={{ $data->city_id }}
                                    zip_code={{ $data->postal_code }}
                                    {{ $data->city_id == $user->address->city_id ? 'selected' : '' }}>
                                    {{ $data->city_name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" class="px-2 py-2 col-span-full" value="{{ $user->address->address }}"
                            placeholder="Alamat Penerima" required>
                        <input type="number" class="px-2 py-2" id="zip_code" value="{{ $user->address->zip_code }}"
                            placeholder="Kode Pos Penerima" required>
                        <select name="cost" id="cost">
                            <option value="" selected disabled cost_id>Pilih Jenis Pengiriman</option>
                            @foreach ($cost->costs as $key => $data)
                                <option value="{{ $data->cost[0]->value }}" {{ $key == 0 ? 'selected' : '' }}>
                                    JNE {{ $data->service }} | Estimasi : {{ $data->cost[0]->etd }} hari
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center justify-between pt-16">
                        <p class="text-base leading-none text-gray-800">Subtotal</p>
                        <p class="text-base leading-none text-gray-800">Rp {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex items-center justify-between pt-5">
                        <p class="text-base leading-none text-gray-800">Ongkos Kirim</p>
                        <p class="text-base leading-none text-gray-800">Rp
                            <span id="shipping">{{ number_format($cost->costs[0]->cost[0]->value, 0, ',', '.') }}</span>
                        </p>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between pt-20 pb-6 lg:pt-5">
                        <p class="text-2xl leading-normal text-gray-800">Total</p>
                        <p class="text-2xl font-bold leading-normal text-right text-gray-800">
                            Rp.
                            <span
                                id="total">{{ number_format($total + $cost->costs[0]->cost[0]->value, 0, ',', '.') }}</span>
                        </p>
                    </div>
                    <button onclick="checkoutHandler1(true)"
                        class="w-full py-5 text-base leading-none text-white transition-all ease-in-out bg-gray-800 border border-gray-800 rounded hover:bg-gradient-to-br hover:from-gray-700 hover:to-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">Checkout</button>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="fixed top-0 w-full h-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-90 sticky-0" id="chec-div">
    </div> --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $("#province").change(function() {
                let province_id = $(this).find('option:selected').attr('province_id');
                const url = 'https://api.rajaongkir.com/starter/city';
                const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
                const corsUrl = proxyUrl + url;
                // console.log(corsUrl);

                $("#province_id").val(province_id);
                $.ajax({
                    method: 'GET',
                    url: '{{ route('get_list_city') }}',
                    data: {
                        provinceId: province_id
                    },
                    success: function(response) {
                        // console.log(response);
                        $('#city').html(
                            "<option value='' city_id selected disabled> Pilih Kota </option>"
                        );
                        $.each(response, function(index, city) {
                            // Create an option element and set the value and province_id attributes
                            var option = $('<option>').val(city.city_name).attr(
                                'city_id', city.city_id).attr(
                                'zip_code', city.postal_code);
                            // Set the text of the option element to the city name
                            option.text(city.city_name);
                            // Add the option element to the #city select element
                            $('#city').append(option);
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })

            $("#city").change(function() {
                let city_id = $(this).find('option:selected').attr('city_id');
                let zip_code = $(this).find('option:selected').attr('zip_code');

                $("#city_id").val(city_id);
                $("#zip_code").val(zip_code);

                $.ajax({
                    method: 'GET',
                    url: '{{ route('get_cost') }}',
                    data: {
                        destination: city_id,
                        weight: {{ $weight }},
                    },
                    success: function(response) {
                        console.log(response);
                        $('#cost').html(
                            "<option value='' cost_id selected disabled> Pilih Jenis Pengiriman </option>"
                        );
                        $.each(response.costs, function(index, cost) {
                            // Create an option element and set the value and province_id attributes
                            var option = $('<option>').val(cost.cost[0].value);
                            // Set the text of the option element to the cost name
                            option.text(
                                `JNE ${cost.service} | Estimasi : ${cost.cost[0].etd} hari`
                            );
                            // Add the option element to the #cost select element
                            $('#cost').append(option);
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })

            $("#cost").change(function() {
                $("#shipping").text($(this).val().toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
                $("#total").text((parseInt({{ $total }}) + parseInt($(this).val())).toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, "."))
            })

        })
    </script>
@endsection
