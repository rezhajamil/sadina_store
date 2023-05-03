@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="items-start justify-center px-4 py-12 md:flex 2xl:px-20 md:px-6">
        <div class="xl:w-2/6 lg:w-2/5">
            <x-carousel :images="$product->images" :name="$product->name" :category="$product->category->name" />
        </div>
        <form class="mt-6 xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0" method="POST" action="{{ route('add_cart') }}"
            id="form-cart">
            @csrf
            <input type="hidden" name="product" value="{{ $product->id }}">
            <div class="pb-6 border-b border-gray-200">
                <p class="text-sm leading-none text-gray-600 ">{{ $product->category->name }}</p>
                <h1 class="mt-2 text-xl font-semibold leading-7 text-gray-800 lg:text-2xl lg:leading-6">
                    {{ $product->name }}
                </h1>
            </div>
            <div class="flex items-center justify-between py-4 border-b border-gray-200 gap-x-2">
                <p class="text-base leading-4 text-gray-800 ">Warna</p>
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                    @foreach ($product->colors as $color)
                        <div class="w-full">
                            <input type="radio" name="color" id="color{{ $color->color->id }}"
                                value="{{ $color->color->id }}" class="hidden peer" required>
                            <label for="color{{ $color->color->id }}"
                                class="relative flex items-center justify-between p-2 overflow-hidden text-gray-600 rounded flex-nowrap peer-checked:bg-secondary-400 peer-checked:text-white">
                                <p class="text-sm leading-none whitespace-nowrap">
                                    {{ $color->color->name }}
                                </p>
                                <div class="w-6 h-6 ml-3 border border-gray-800 cursor-pointer"
                                    style="background-color: {{ $color->color->hex }}">
                                </div>
                                {{-- <div
                                class="absolute inset-0 hidden w-full h-full border-4 rounded bg-primary-600 border-primary-600 -z-10 border-spacing-3 peer-checked:block">
                            </div> --}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <span class="hidden sm:block"><i class="text-gray-800 fa-solid fa-palette"></i></span>
            </div>
            <div class="flex items-center justify-between py-2 border-b border-gray-200">
                <p class="text-base leading-4 text-gray-800 ">Ukuran</p>
                <div class="flex justify-center w-full gap-3">
                    @foreach ($product->sizes as $size)
                        <div class="w-fit">
                            <input type="radio" name="size" id="size{{ $size->size->id }}"
                                value="{{ $size->size->id }}" class="hidden peer" required>
                            <label for="size{{ $size->size->id }}"
                                class="relative flex items-center justify-between p-4 overflow-hidden text-gray-600 rounded flex-nowrap peer-checked:bg-secondary-400 peer-checked:text-white">
                                <p class="text-sm leading-none whitespace-nowrap">
                                    {{ $size->size->name }}
                                </p>
                                {{-- <div
                                class="absolute inset-0 hidden w-full h-full border-4 rounded bg-primary-600 border-primary-600 -z-10 border-spacing-3 peer-checked:block">
                            </div> --}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <span class="hidden sm:block"><i class="text-gray-800 fa-solid fa-ruler-combined"></i></span>

            </div>
            <button type="submit" id="submit-cart"
                class="flex items-center justify-center w-full py-4 text-base font-bold leading-none text-white bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 hover:bg-gray-700">
                <div class="p-3 mr-3 bg-white rounded-sm">
                    <i class="text-gray-800 fa-solid fa-cart-shopping"></i>
                    <i class="text-lg text-gray-800 fa-solid fa-circle-notch animate-spin" style="display: none"></i>
                </div>
                Masukkan Keranjang
            </button>
            <div>
                <p class="text-base leading-normal text-gray-600 xl:pr-48 lg:leading-tight mt-7">
                    {!! $product->description !!}
                </p>
            </div>
            <div>
                <div class="py-4 border-t border-b border-gray-200 mt-7">
                    <div data-menu class="flex items-center justify-between cursor-pointer select-none">
                        <p class="text-base leading-4 text-gray-800">Tag Produk</p>
                        <button
                            class="rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400"
                            role="button" aria-label="show or hide">
                            <img class="transform"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg" alt="dropdown">
                        </button>
                    </div>
                    <div class="hidden gap-3 pt-4 mt-4 text-base leading-normal text-gray-600 " id="sect">
                        @foreach ($product->tags as $tag)
                            <div class="px-3 py-2 font-semibold text-white rounded-sm select-none bg-secondary-600">
                                {{ $tag->tag->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("[data-menu]").click(function() {
                let main = $(this);
                let element = main.parent().parent();
                let andicators = main.find("img");
                let child = element.find("#sect");
                child.toggleClass("hidden").toggleClass("flex");
                andicators.eq(0).toggleClass("rotate-180");
            });

            // Carousel Function
            let defaultTransform = 0;

            $("#next").on("click", function() {
                defaultTransform = defaultTransform - 398;
                var slider = $("#slider");
                if (Math.abs(defaultTransform) >= slider[0].scrollWidth / 1.7) defaultTransform = 0;
                slider.css("transform", "translateX(" + defaultTransform + "px)");
            });

            $("#prev").on("click", function() {
                var slider = $("#slider");
                if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
                else defaultTransform = defaultTransform + 398;
                slider.css("transform", "translateX(" + defaultTransform + "px)");

            });

            $("#nextBig").on("click", function() {
                defaultTransform = defaultTransform - 398;
                var slider = $("#sliderBig");
                if (Math.abs(defaultTransform) >= slider[0].scrollWidth / 1.7) defaultTransform = 0;
                slider.css("transform", "translateX(" + defaultTransform + "px)");

            });

            $("#prevBig").on("click", function() {
                var slider = $("#sliderBig");
                if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
                else defaultTransform = defaultTransform + 398;
                slider.css("transform", "translateX(" + defaultTransform + "px)");
            });
        })
    </script>
@endsection
