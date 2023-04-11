@extends('layouts.app')
@section('body')
    <div class="px-4 py-6 lg:px-20 md:px-6">
        <p class="text-sm font-normal leading-3 text-gray-600">
            Browse
        </p>
        <hr class="w-full my-6 bg-gray-200" />

        <div class="flex items-center justify-between">
            <div class="flex items-center justify-center space-x-3 text-gray-800">
                <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-5-svg1.svg"
                    alt="toggler" />
                <img class="hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-5-svg1dark.svg"
                    alt="toggler" />
                <p class="text-base font-normal leading-4 text-gray-800">
                    Filter
                </p>
            </div>
            <p class="text-base font-normal leading-4 text-gray-600 duration-100 cursor-pointer hover:underline">
                Showing 18 products
            </p>
        </div>

        <div
            class="grid grid-cols-1 mt-10 lg:grid-cols-4 sm:grid-cols-2 lg:gap-y-12 lg:gap-x-8 sm:gap-y-10 sm:gap-x-6 gap-y-6 lg:mt-12">
            <div class="relative">
                <div class="absolute top-0 left-0 px-4 py-2 bg-white bg-opacity-50">
                    <p class="text-xs leading-3 text-gray-800">New</p>
                </div>
                <div class="relative group">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
                    </div>
                    <img class="w-full" src="https://i.ibb.co/HqmJYgW/gs-Kd-Pc-Iye-Gg.png" alt="A girl Posing Image" />
                    <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
                        <button class="w-full py-3 text-base font-medium leading-4 text-gray-800 bg-white">
                            Add to bag
                        </button>
                        <button
                            class="w-full py-3 mt-2 text-base font-medium leading-4 text-white bg-transparent border-2 border-white">
                            Quick View
                        </button>
                    </div>
                </div>
                <p class="mt-4 text-xl font-normal leading-5 text-gray-800 md:mt-6">
                    Wilfred Alana Dress
                </p>
                <p class="mt-4 text-xl font-semibold leading-5 text-gray-800">
                    $1550
                </p>
                <p class="mt-4 text-base font-normal leading-4 text-gray-600">
                    2 colours
                </p>
            </div>
            <div class="relative">
                <div class="absolute top-0 right-0 px-2 py-1 bg-white bg-opacity-50">
                    <p class="text-base leading-4 text-white fonr-normal">
                        XS , S , M , L
                    </p>
                </div>
                <div class="relative group">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
                    </div>
                    <img class="w-full" src="https://i.ibb.co/m6V0MzR/gs-Kd-Pc-Iye-Gg-1.png"
                        alt="A girl wearing white suit and googgles" />
                    <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
                        <button class="w-full py-3 text-base font-medium leading-4 text-gray-800 bg-white">
                            Add to bag
                        </button>
                        <button
                            class="w-full py-3 mt-2 text-base font-medium leading-4 text-white bg-transparent border-2 border-white">
                            Quick View
                        </button>
                    </div>
                </div>
                <p class="mt-4 text-xl font-normal leading-5 text-gray-800 md:mt-6">
                    Wilfred Alana Dress
                </p>
                <p class="mt-4 text-xl font-semibold leading-5 text-gray-800">
                    $1800
                </p>
            </div>
            <div>
                <div class="relative group">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
                    </div>
                    <img class="w-full" src="https://i.ibb.co/6g1KhhF/pexels-django-li-2956641-1.png"
                        alt="A girl wearing dark blue suit and posing" />
                    <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
                        <button class="w-full py-3 text-base font-medium leading-4 text-gray-800 bg-white">
                            Add to bag
                        </button>
                        <button
                            class="w-full py-3 mt-2 text-base font-medium leading-4 text-white bg-transparent border-2 border-white">
                            Quick View
                        </button>
                    </div>
                </div>
                <p class="mt-4 text-xl font-normal leading-5 text-gray-800 md:mt-6">
                    Wilfred Alana Dress
                </p>
                <p class="mt-4 text-xl font-semibold leading-5 text-gray-800">
                    $1550
                </p>
                <p class="mt-4 text-base font-normal leading-4 text-gray-600">
                    2 colours
                </p>
            </div>
            <div>
                <div class="relative group">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
                    </div>
                    <img class="w-full" src="https://i.ibb.co/KLDN7Vt/gbarkz-vq-Knu-G8-Ga-Qc-unsplash.png"
                        alt="A girl posing and wearing white suit" />
                    <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
                        <button class="w-full py-3 text-base font-medium leading-4 text-gray-800 bg-white">
                            Add to bag
                        </button>
                        <button
                            class="w-full py-3 mt-2 text-base font-medium leading-4 text-white bg-transparent border-2 border-white">
                            Quick View
                        </button>
                    </div>
                </div>

                <p class="mt-4 text-xl font-normal leading-5 text-gray-800 md:mt-6">
                    Flared Cotton Tank Top
                </p>
                <p class="mt-4 text-xl font-semibold leading-5 text-gray-800">
                    $1800
                </p>
            </div>
            <div>
                <div class="relative group">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
                    </div>
                    <img class="w-full" src="https://i.ibb.co/5vxgf7V/pexels-quang-anh-ha-nguyen-884979-1.png"
                        alt="Girl posing for an Image" />
                    <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
                        <button class="w-full py-3 text-base font-medium leading-4 text-gray-800 bg-white">
                            Add to bag
                        </button>
                        <button
                            class="w-full py-3 mt-2 text-base font-medium leading-4 text-white bg-transparent border-2 border-white">
                            Quick View
                        </button>
                    </div>
                </div>

                <p class="mt-4 text-xl font-normal leading-5 text-gray-800 md:mt-6">
                    Flared Cotton Tank Top
                </p>
                <p class="mt-4 text-xl font-semibold leading-5 text-gray-800">
                    $1800
                </p>
            </div>
            <div>
                <div class="relative group">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
                    </div>
                    <img class="w-full" src="https://i.ibb.co/HKFXSrQ/pietra-schwarzler-l-SLq-x-Qd-FNI-unsplash.png"
                        alt="A blonde girl posing" />
                    <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
                        <button class="w-full py-3 text-base font-medium leading-4 text-gray-800 bg-white">
                            Add to bag
                        </button>
                        <button
                            class="w-full py-3 mt-2 text-base font-medium leading-4 text-white bg-transparent border-2 border-white">
                            Quick View
                        </button>
                    </div>
                </div>

                <p class="mt-4 text-xl font-normal leading-5 text-gray-800 md:mt-6">
                    Wilfred Alana Dress
                </p>
                <p class="mt-4 text-xl font-semibold leading-5 text-gray-800">
                    $1550
                </p>
                <p class="mt-4 text-base font-normal leading-4 text-gray-600">
                    2 colours
                </p>
            </div>
            <div>
                <div class="relative group">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
                    </div>
                    <img class="w-full" src="https://i.ibb.co/BKsqym2/tracey-hocking-ve-Zp-XKU71c-unsplash.png"
                        alt="A girl wearing white suit posing in desert" />
                    <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
                        <button class="w-full py-3 text-base font-medium leading-4 text-gray-800 bg-white">
                            Add to bag
                        </button>
                        <button
                            class="w-full py-3 mt-2 text-base font-medium leading-4 text-white bg-transparent border-2 border-white">
                            Quick View
                        </button>
                    </div>
                </div>

                <p class="mt-4 text-xl font-normal leading-5 text-gray-800 md:mt-6">
                    Flared Cotton Tank Top
                </p>
                <p class="mt-4 text-xl font-semibold leading-5 text-gray-800">
                    $1800
                </p>
            </div>
            <div>
                <div class="relative group">
                    <div
                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full opacity-0 bg-gradient-to-t from-gray-800 via-gray-800 to-opacity-30 group-hover:opacity-50">
                    </div>
                    <img class="w-full" src="https://i.ibb.co/mbrk1DK/pexels-h-i-nguy-n-4034532.png"
                        alt="Girl wearing pink suit posing" />
                    <div class="absolute bottom-0 w-full p-8 opacity-0 group-hover:opacity-100">
                        <button class="w-full py-3 text-base font-medium leading-4 text-gray-800 bg-white">
                            Add to bag
                        </button>
                        <button
                            class="w-full py-3 mt-2 text-base font-medium leading-4 text-white bg-transparent border-2 border-white">
                            Quick View
                        </button>
                    </div>
                </div>

                <p class="mt-4 text-xl font-normal leading-5 text-gray-800 md:mt-6">
                    Flared Cotton Tank Top
                </p>
                <p class="mt-4 text-xl font-semibold leading-5 text-gray-800">
                    $1800
                </p>
            </div>
        </div>

        <div class="flex items-center justify-center">
            <button
                class="w-full py-5 mt-10 text-base font-medium leading-4 text-white bg-gray-800 hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 md:px-16 md:w-auto lg:mt-28 md:mt-12">
                Load More
            </button>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {});
    </script>
@endsection
