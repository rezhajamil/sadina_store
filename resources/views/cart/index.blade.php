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
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="w-full h-full bg-gray-200">
            <input type="hidden" name="json_province" value="{{ json_encode($province) }}">
            <form action="{{ route('payment.store') }}" method="POST"
                class="flex flex-col h-auto px-4 py-6 overflow-y-auto lg:h-screen lg:px-8 md:px-7 lg:py-20 md:py-10">
                @csrf
                <p class="text-3xl font-black leading-9 text-gray-800 lg:text-4xl">Summary</p>
                <div id="shipping-container">
                    <div class="grid grid-cols-2 gap-3 mt-4" id="shipping-form">
                        <div class="flex items-end mb-2 gap-x-1 col-span-full">
                            <span class="font-semibold col-span-full">Kirim Ke</span>
                            <select name="select_address" id="select_address"
                                class="inline p-0 pr-8 underline bg-transparent border-0">
                                <option value="main" {{ old('select_address') == 'main' ? 'selected' : '' }}
                                    class="">
                                    Alamat Utama</option>
                                <option value="other" {{ old('select_address') == 'other' ? 'selected' : '' }}
                                    class="">
                                    Alamat Lain</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <input type="text" name="name" id="name" class="px-2 py-2"
                                value="{{ old('name', $user->name) }}" placeholder="Nama Penerima"
                                {{ old('select_address') == 'main' ? 'readonly' : '' }} required>
                            @error('name')
                                <span class="block text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <input type="number" name="phone" class="px-2 py-2"
                                value="{{ old('phone', $user->whatsapp ?? $user->phone) }}" placeholder="Kontak Penerima"
                                {{ old('select_address') == 'main' ? 'readonly' : '' }} required>
                            @error('phone')
                                <span class="block text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <select name="province" id="province" readonly required>
                                <option value="" selected disabled province_id>Pilih Provinsi</option>
                                @if (old('select_address') != 'other')
                                    <option value="{{ $user->address->province }}"
                                        province_id={{ $user->address->province_id }} selected>
                                        {{ $user->address->province }}
                                    </option>
                                @else
                                    @foreach ($province as $data)
                                        <option value="{{ $data->province }}" province_id={{ $data->province_id }}
                                            {{ $data->province == old('province') ? 'selected' : '' }}>
                                            {{ $data->province }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('province')
                                <span class="block text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <select name="city" id="city" readonly required>
                                <option value="" selected disabled city_id>Pilih Kota</option>
                                <option value="{{ $user->address->city }}" city_id={{ $user->address->city_id }} selected>
                                    {{ $user->address->city }}
                                </option>
                                {{-- @foreach ($city as $data)
                                    <option value="{{ $data->city_name }}" city_id={{ $data->city_id }}
                                        zip_code={{ $data->postal_code }}
                                        {{ $data->city_id == $user->address->city_id ? 'selected' : '' }}>
                                        {{ $data->city_name }}
                                    </option>
                                @endforeach --}}
                            </select>
                            @error('city')
                                <span class="block text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col col-span-full">
                            <input type="text" name="address" class="px-2 py-2 col-span-full"
                                value="{{ $user->address->address }}" placeholder="Alamat Penerima"
                                {{ old('select_address') == 'main' ? 'readonly' : '' }} required>
                            @error('address')
                                <span class="block text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <input type="number" name="zip_code" class="px-2 py-2" id="zip_code"
                                value="{{ $user->address->zip_code }}" placeholder="Kode Pos Penerima" required>
                            @error('zip_code')
                                <span class="block text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <select name="cost" id="cost" required>
                                <option value="" selected disabled cost_id>Pilih Jenis Pengiriman</option>
                                @foreach ($cost->costs as $key => $data)
                                    <option value="{{ $data->cost[0]->value }}" {{ $key == 0 ? 'selected' : '' }}>
                                        JNE {{ $data->service }} | Estimasi : {{ $data->cost[0]->etd }} hari
                                    </option>
                                @endforeach
                            </select>
                            @error('cost')
                                <span class="block text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="">
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
                    <input type="hidden" name="subtotal" value="{{ $total }}">
                    <input type="hidden" name="shipping" value="{{ $cost->costs[0]->cost[0]->value }}">
                    <input type="hidden" name="total_amount" value="{{ $total + $cost->costs[0]->cost[0]->value }}">
                    <button
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
            const form = $("#shipping-container").html();
            const new_form = $("#shipping-form").clone();
            const list_province = JSON.parse($("input[name=json_province]").val());
            // console.log(list_province);
            $(document).on('change', "#province", function() {
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
                        console.log(response);
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

            $(document).on('change', "#city", function() {
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
                        // console.log(response);
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

                        $("#shipping").text(0)
                        $("#total").text(parseInt({{ $total }}).toString()
                            .replace(/\B(?=(\d{3})+(?!\d))/g, "."))

                        $("input[name='shipping']").val(0);
                        $("input[name='total_amount']").val(parseInt({{ $total }}));

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })

            $(document).on('change', "#cost", function() {
                $("#shipping").text($(this).val().toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
                $("#total").text((parseInt({{ $total }}) + parseInt($(this).val())).toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, "."))

                $("input[name='shipping']").val($(this).val());
                $("input[name='total_amount']").val((parseInt({{ $total }}) + parseInt($(this)
                    .val())));
            })

            $(document).on('change', '#select_address', function() {
                let value = $(this).val();
                let container = $('#shipping-container');

                // console.log({
                //     form,
                // });
                if (value == 'main') {
                    container.html(form);
                    // console.log({
                    //     form: form.find('#name').val(),
                    // });
                } else if (value == 'other') {
                    let html_province = '';

                    new_form.find('#select_address option[value=other]').attr('selected', true);
                    new_form.find('input').attr('readonly', false).val('');
                    new_form.find('select').attr('readonly', false);
                    new_form.find('#city').html(`<option selected disabled>Pilih Kota</option>`);

                    list_province.map((province, idx) => {
                        html_province += `
                        <option value="${province.province}" province_id=${province.province_id}>
                            ${province.province}
                        </option>
                        `;
                    })

                    new_form.find('#province').html(`<option selected disabled>Pilih Provinsi</option>` +
                        html_province);
                    container.html(new_form)
                    // console.log({
                    //     form: form.find('#name').val(),
                    //     new_form: new_form.find('#name').val()
                    // });
                }
            })

        })
    </script>
@endsection
