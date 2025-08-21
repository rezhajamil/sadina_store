@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="bg-primary-200 px-6 py-4">
        @if (session('warning'))
            <div class="flex items-center justify-center px-4 sm:px-0">
                <div role="alert" id="alert"
                    class="top-0 mb-8 mt-12 items-center justify-between rounded-md bg-yellow-100 px-4 py-4 shadow transition duration-150 ease-in-out md:flex lg:w-10/12">
                    <div class="items-center sm:flex">
                        <div class="flex items-end">
                            <div class="mr-2 mt-0.5 text-yellow-700 sm:mt-0">
                                <img class="focus:outline-none"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/color-coded-with-icon-warning-svg1.svg"
                                    alt="warning" />
                            </div>
                            <p class="mr-2 text-base font-bold text-yellow-700">Perhatian</p>
                        </div>
                        <div class="mr-2 hidden h-1 w-1 rounded-full bg-yellow-700 xl:block"></div>
                        <p class="text-base text-yellow-700">Harap melengkapi data diri anda</p>
                    </div>
                </div>
            </div>
        @endif
        <form id="profile" action="{{ route('profile') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="">
                <div class="container mx-auto rounded bg-white px-4">
                    <div class="border-b-2 border-primary-600 py-5 xl:w-full">
                        <div class="flex w-11/12 items-center xl:mx-0 xl:w-full">
                            <p class="text-lg font-bold text-gray-800">Profile</p>
                            <div class="ml-2 cursor-pointer text-black">
                                <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg"
                                    alt="info">
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <div class="mx-auto w-full py-4">
                            <div class="flex w-full justify-center">
                                <div
                                    class="aspect-square h-36 w-36 overflow-hidden rounded-full border-2 border-primary-600 bg-white object-cover object-center">
                                    <img src="{{ $user->avatar }}" class="w-full" alt="Image User"
                                        onerror="this.onerror=null;this.src='{{ asset('images/avatar.png') }}';">
                                </div>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-4 sm:mt-16 md:grid-cols-3">
                                <div class="flex w-full flex-col">
                                    <label for="Email" class="pb-2 text-sm font-bold text-gray-800">Email</label>
                                    <input tabindex="0" type="text" id="Email" name="Email" required
                                        class="w-full rounded border border-primary-600 bg-transparent py-3 pl-3 text-sm text-black placeholder-gray-500 shadow-sm focus:border-secondary-300 focus:outline-none disabled:border-gray-300"
                                        placeholder="Email" disabled value="{{ $user->email }}" />
                                </div>
                                <div class="flex w-full flex-col">
                                    <label for="phone" class="pb-2 text-sm font-bold text-gray-800">Telepon</label>
                                    <div class="flex">
                                        <div
                                            class="w-fit rounded rounded-r-none border border-primary-600 bg-primary-400 bg-transparent p-3 text-sm text-black placeholder-gray-500 shadow-sm focus:border-secondary-300 focus:outline-none">
                                            <span class="font-semibold text-black">+62</span>
                                        </div>
                                        <input tabindex="0" type="text" id="phone" name="phone" required
                                            class="w-full rounded rounded-l-none border border-primary-600 bg-transparent py-3 pl-3 text-sm text-black placeholder-gray-500 shadow-sm focus:border-secondary-300 focus:outline-none"
                                            placeholder="81234567890" value="{{ old('phone', $user->phone) }}" />
                                    </div>
                                    @error('phone')
                                        <span class="block text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex w-full flex-col">
                                    <label for="whatsapp" class="pb-2 text-sm font-bold text-gray-800">Whatsapp</label>
                                    <div class="flex">
                                        <div
                                            class="w-fit rounded rounded-r-none border border-primary-600 bg-primary-400 bg-transparent p-3 text-sm text-black placeholder-gray-500 shadow-sm focus:border-secondary-300 focus:outline-none">
                                            <span class="font-semibold text-black">+62</span>
                                        </div>
                                        <input tabindex="0" type="text" id="whatsapp" name="whatsapp" required
                                            readonly
                                            class="w-full rounded rounded-l-none border border-primary-600 bg-transparent py-3 pl-3 text-sm text-black placeholder-gray-500 shadow-sm focus:border-secondary-300 focus:outline-none"
                                            placeholder="81234567890" value="{{ old('whatsapp', $user->whatsapp) }}" />
                                    </div>
                                    @error('whatsapp')
                                        <span class="block text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                    {{-- <input tabindex="0" type="text" id="whatsapp" name="whatsapp" required
                                        class="py-3 pl-3 w-full text-sm placeholder-gray-500 text-black bg-transparent rounded border shadow-sm border-primary-600 focus:outline-none focus:border-secondary-300 disabled:border-gray-300"
                                        placeholder="81234567890" disabled /> --}}
                                    <div class="mt-2 flex items-center gap-x-1">
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
                <div class="container mx-auto mt-10 rounded bg-white p-4">
                    <div class="border-b border-primary-600 py-5 xl:w-full">
                        <div class="flex w-11/12 items-center xl:mx-0 xl:w-full">
                            <p class="text-lg font-bold text-gray-800">Personal Information</p>
                            <div class="ml-2 cursor-pointer text-black">
                                <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg"
                                    alt="info">
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto pt-4">
                        <div class="container mx-auto grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">
                            <div class="col-span-full flex flex-col lg:col-span-1">
                                <label for="name" class="pb-2 text-sm font-bold text-gray-800">Nama Lengkap</label>
                                <input tabindex="0" type="text" id="name" name="name" required
                                    class="rounded border border-primary-600 bg-transparent text-sm text-black placeholder-gray-500 shadow-sm focus:border-secondary-300 focus:outline-none"
                                    placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}" />
                                @error('name')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="province" class="pb-2 text-sm font-bold text-gray-800">Provinsi</label>
                                <select name="province" id="province"
                                    class="flex rounded border border-primary-600 text-sm text-black shadow-sm" required>
                                    <option value="" province_id selected disabled>
                                        Pilih Provinsi
                                    </option>
                                    @foreach ($province as $data)
                                        <option value="{{ $data->name }}" province_id="{{ $data->id }}"
                                            {{ old('province', $user->address->province) == $data->name ? 'selected' : '' }}>
                                            {{ $data->name }}
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
                            <input type="hidden" name="province_id" id="province_id" value="{{ $data->id }}">
                            <div class="flex flex-col">
                                <label for="city" class="pb-2 text-sm font-bold text-gray-800">Kota</label>
                                <select name="city" id="city"
                                    class="flex rounded border border-primary-600 text-sm text-black shadow-sm" required>
                                    <option value="" city_id selected disabled>
                                        Pilih Kota
                                    </option>
                                    @if (old('province', $user->address->province) == $user->address->province)
                                        @foreach ($city as $item)
                                            <option value="{{ $item->name }}" city_id="{{ $item->id }}"
                                                {{ old('city', $user->address->city) == $item->name ? 'selected' : '' }}>
                                                {{ $item->name }}
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
                                @if (old('province', $user->address->province) == $user->address->province)
                                    <input type="hidden" name="city_id" id="city_id"
                                        value="{{ $user->address->city_id }}">
                                @endif
                            </div>
                            <div class="flex flex-col">
                                <label for="address" class="pb-2 text-sm font-bold text-gray-800">Alamat
                                    Lengkap</label>
                                <input tabindex="0" type="text" id="address" name="address" required
                                    class="rounded border border-primary-600 bg-transparent text-sm text-black placeholder-gray-500 shadow-sm focus:border-secondary-300 focus:outline-none"
                                    placeholder="Alamat Lengkap" value="{{ old('address', $user->address->address) }}" />
                                @error('address')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="zip_code" class="pb-2 text-sm font-bold text-gray-800">Kode Pos</label>
                                <input tabindex="0" type="number" id="zip_code" name="zip_code" required
                                    class="rounded border border-primary-600 bg-transparent text-sm text-black placeholder-gray-500 shadow-sm focus:border-secondary-300 focus:outline-none"
                                    placeholder="Kode Pos"
                                    value="{{ old('zip_code', $user->address->zip_code ?? '') }}" />
                                @error('zip_code')
                                    <span class="block text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <button role="button" type="submit" aria-label="Save form"
                                class="col-span-full rounded bg-primary-700 px-8 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-700 focus:ring-offset-2"
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
                const corsUrl = proxyUrl + url;
                // console.log(corsUrl);

                console.log(province_id);
                $("#province_id").val(province_id);
                console.log($("#province_id").val());
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
                            var option = $('<option>').val(city.name).attr(
                                'city_id', city.id).attr(
                                'zip_code', city.postal_code);
                            // Set the text of the option element to the city name
                            option.text(city.name);
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
