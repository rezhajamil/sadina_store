@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="px-6 py-4 bg-primary-200 ">
        <form id="profile" action="{{ route('profile') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="">
                <div class="container px-4 mx-auto bg-white rounded">
                    <div class="py-5 border-b-2 border-primary-600 xl:w-full ">
                        <div class="flex items-center w-11/12 xl:w-full xl:mx-0">
                            <p class="text-lg font-bold text-gray-800 ">Profile</p>
                            <div class="ml-2 text-black cursor-pointer">
                                <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="hidden "
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg"
                                    alt="info">
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <div class="w-full py-4 mx-auto">
                            <div class="flex justify-center w-full">
                                <div
                                    class="object-cover object-center overflow-hidden bg-white border-2 rounded-full w-36 h-36 border-primary-600 aspect-square">
                                    <img src="{{ $user->avatar }}" class="w-full" alt="Image User"
                                        onerror="this.onerror=null;this.src='{{ asset('images/avatar.png') }}';">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mt-6 sm:mt-16 md:grid-cols-3">
                                <div class="flex flex-col w-full">
                                    <label for="Email" class="pb-2 text-sm font-bold text-gray-800 ">Email</label>
                                    <input tabindex="0" type="text" id="Email" name="Email" required
                                        class="w-full py-3 pl-3 text-sm text-black placeholder-gray-500 bg-transparent border rounded shadow-sm border-primary-600 focus:outline-none disabled:border-gray-300 focus:border-secondary-300"
                                        placeholder="Email" disabled value="{{ $user->email }}" />
                                </div>
                                <div class="flex flex-col w-full">
                                    <label for="phone" class="pb-2 text-sm font-bold text-gray-800 ">Telepon</label>
                                    <div class="flex">
                                        <div
                                            class="p-3 text-sm text-black placeholder-gray-500 bg-transparent border rounded rounded-r-none shadow-sm bg-primary-400 w-fit border-primary-600 focus:outline-none focus:border-secondary-300">
                                            <span class="font-semibold text-black">+62</span>
                                        </div>
                                        <input tabindex="0" type="text" id="phone" name="phone" required
                                            class="w-full py-3 pl-3 text-sm text-black placeholder-gray-500 bg-transparent border rounded rounded-l-none shadow-sm border-primary-600 focus:outline-none focus:border-secondary-300"
                                            placeholder="81234567890" value="{{ old('phone', $user->phone) }}" />
                                    </div>
                                    @error('phone')
                                        <span class="block text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-full">
                                    <label for="whatsapp" class="pb-2 text-sm font-bold text-gray-800 ">Whatsapp</label>
                                    <div class="flex">
                                        <div
                                            class="p-3 text-sm text-black placeholder-gray-500 bg-transparent border rounded rounded-r-none shadow-sm bg-primary-400 w-fit border-primary-600 focus:outline-none focus:border-secondary-300">
                                            <span class="font-semibold text-black">+62</span>
                                        </div>
                                        <input tabindex="0" type="text" id="whatsapp" name="whatsapp" required
                                            class="w-full py-3 pl-3 text-sm text-black placeholder-gray-500 bg-transparent border rounded rounded-l-none shadow-sm border-primary-600 focus:outline-none focus:border-secondary-300"
                                            placeholder="81234567890" value="{{ old('whatsapp', $user->whatsapp) }}" />
                                    </div>
                                    @error('whatsapp')
                                        <span class="block text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                    {{-- <input tabindex="0" type="text" id="whatsapp" name="whatsapp" required
                                        class="w-full py-3 pl-3 text-sm text-black placeholder-gray-500 bg-transparent border rounded shadow-sm border-primary-600 focus:outline-none focus:border-secondary-300 disabled:border-gray-300"
                                        placeholder="81234567890" disabled /> --}}
                                    <div class="flex items-center mt-2 gap-x-1">
                                        <input type="checkbox" name="check_wa" id="check_wa"
                                            class="accent-secondary-400 checked:bg-primary-500 focus:ring-primary-500 checked:focus:bg-primary-500"
                                            {{ old('check_wa') ? 'checked' : '' }}>
                                        <label for="check_wa" class="text-xs font-light text-black">Nomor WhatsApp
                                            berbeda
                                            dengan Nomor
                                            Telepon</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container p-4 mx-auto mt-10 bg-white rounded">
                    <div class="py-5 border-b border-primary-600 xl:w-full ">
                        <div class="flex items-center w-11/12 xl:w-full xl:mx-0">
                            <p class="text-lg font-bold text-gray-800 ">Personal Information</p>
                            <div class="ml-2 text-black cursor-pointer">
                                <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="hidden "
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg"
                                    alt="info">
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 mx-auto">
                        <div class="container grid grid-cols-1 gap-4 mx-auto sm:grid-cols-2 lg:grid-cols-4">
                            <div class="flex flex-col col-span-full lg:col-span-1">
                                <label for="name" class="pb-2 text-sm font-bold text-gray-800 ">Nama Lengkap</label>
                                <input tabindex="0" type="text" id="name" name="name" required
                                    class="text-sm text-black placeholder-gray-500 bg-transparent border rounded shadow-sm border-primary-600 focus:outline-none focus:border-secondary-300"
                                    placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}" />
                                @error('name')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="province" class="pb-2 text-sm font-bold text-gray-800 ">Provinsi</label>
                                <select name="province" id="province"
                                    class="flex text-sm text-black border rounded shadow-sm border-primary-600 " required>
                                    <option value="" province_id selected disabled>
                                        Pilih Provinsi
                                    </option>
                                    @foreach ($province as $data)
                                        <option value="{{ $data->province }}" province_id="{{ $data->province_id }}"
                                            {{ old('province', $user->address->province) == $data->province ? 'selected' : '' }}>
                                            {{ $data->province }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                                @error('province_id')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="province_id" id="province_id">
                            <div class="flex flex-col">
                                <label for="city" class="pb-2 text-sm font-bold text-gray-800 ">Kota</label>
                                <select name="city" id="city"
                                    class="flex text-sm text-black border rounded shadow-sm border-primary-600 " required>
                                    <option value="" city_id selected disabled>
                                        Pilih Kota
                                    </option>
                                    @if (old('province', $user->address->province) == $user->address->province)
                                        @foreach ($city as $item)
                                            <option value="{{ $item->city_name }}" city_id="{{ $item->city_id }}"
                                                {{ old('province', $user->address->city) == $item->city_name ? 'selected' : '' }}>
                                                {{ $item->city_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('city')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                                @error('city_id')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                                <input type="hidden" name="city_id" id="city_id">
                                {{-- <div class="flex flex-col"><label for="zip_code"
                                    class="pb-2 text-sm font-bold text-gray-800 ">Kode Pos</label>
                                <input tabindex="0" type="text" name="zip_code" required id="zip_code" readonly
                                    class="py-3 pl-3 text-sm text-black placeholder-gray-500 bg-transparent border border-red-400 rounded shadow-sm focus:outline-none focus:border-secondary-300"
                                    placeholder="Kode Pos" />
                            </div> --}}
                            </div>
                            <div class="flex flex-col col-span-full lg:col-span-1">
                                <label for="address" class="pb-2 text-sm font-bold text-gray-800 ">Alamat
                                    Lengkap</label>
                                <input tabindex="0" type="text" id="address" name="address" required
                                    class="text-sm text-black placeholder-gray-500 bg-transparent border rounded shadow-sm border-primary-600 focus:outline-none focus:border-secondary-300"
                                    placeholder="" value="{{ old('address', $user->address->address) }}" />
                                @error('address')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <button role="button" type="submit" aria-label="Save form"
                                class="px-8 py-2 text-sm text-white transition duration-150 ease-in-out rounded col-span-full bg-primary-700 focus:ring-2 focus:ring-offset-2 focus:ring-primary-700 focus:outline-none hover:bg-primary-600"
                                type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#check_wa').change(function() {
                if ($(this).is(':checked')) {
                    $('#whatsapp').prop('readonly', false);
                } else {
                    $('#whatsapp').prop('readonly', true);
                    $('#whatsapp').val($("#phone").val());
                }
            });

            $("#phone").on('input', function() {
                $('#whatsapp').val($(this).val());
            })


            $("#province").change(function() {
                let province_id = $(this).find('option:selected').attr('province_id');
                const url = 'https://api.rajaongkir.com/starter/city';
                const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
                const fullUrl = proxyUrl + url;
                // console.log(fullUrl);

                console.log(province_id);
                $("#province_id").val(province_id);
                console.log($("#province_id").val());
                $.ajax({
                    method: 'GET',
                    url: fullUrl,
                    data: {
                        province: province_id
                    },
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'key': "{{ env('RAJAONGKIR_API_KEY') }}"
                    },
                    success: function(response) {
                        console.log(response);
                        $('#city').html(
                            "<option value='' city_id selected disabled> Pilih Kota </option>"
                        );
                        $.each(response.rajaongkir.results, function(index, city) {
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
            })
        });
    </script>
@endsection
