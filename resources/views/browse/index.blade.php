@extends('layouts.app')
@section('body')
    @if (session('success'))
        <x-alert type='success'>{{ session('success') }}</x-alert>
    @endif
    <div class="px-4 py-6 lg:px-20 md:px-6">
        <p class="text-sm font-normal leading-3 text-gray-600">
            Cari Busana
        </p>
        <hr class="w-full my-6 bg-gray-200" />

        <div class="flex flex-wrap items-center justify-between gap-y-6 gap-x-4">
            <div class="flex gap-x-4">
                <div id="btn-filter"
                    class="flex items-center justify-center space-x-3 text-gray-800 transition-all cursor-pointer hover:text-primary-500 ">
                    <i class="fa-solid fa-bars"></i>
                    <button class="text-base font-normal leading-4">
                        Filter
                    </button>
                </div>
                <div id="btn-sort"
                    class="flex items-center justify-center space-x-3 text-gray-800 transition-all cursor-pointer hover:text-primary-500 "
                    sort='default'>
                    <i class="fa-solid fa-sort"></i>
                    <button class="text-base font-normal leading-4">
                        Urutkan Harga
                    </button>
                </div>
            </div>
            <p
                class="text-base font-normal leading-4 text-gray-400 transition-all duration-100 cursor-pointer hover:underline hover:text-primary-500">
                Showing {{ count($products) }} products
            </p>
        </div>
        <x-filter :colors="$colors" :sizes="$sizes" :categories="$categories" />
        @if (count($products))
            <div class="grid grid-cols-1 mt-10 lg:grid-cols-4 sm:grid-cols-2 lg:gap-y-12 lg:gap-x-8 sm:gap-y-10 sm:gap-x-6 gap-y-6 lg:mt-12"
                id="browse-container">
                @foreach ($products as $key => $product)
                    <x-product-card :product="$product"></x-product-card>
                    {{-- <x-product-card :product="$product"></x-product-card>
                    <x-product-card :product="$product"></x-product-card>
                    <x-product-card :product="$product"></x-product-card> --}}
                @endforeach
            </div>
        @else
            <h1 class="w-full mx-auto mt-4 text-xl font-bold text-center text-gray-500">Tidak Ada Produk Tersedia</h1>
        @endif

        @if (count($products) >= 30)
            {{ $products->links('components.pagination', ['data' => $products]) }}
            {{-- <div class="flex items-center justify-center">
                <button
                    class="w-full py-5 mt-10 text-base font-medium leading-4 text-white bg-primary-800 hover:bg-primary-700 focus:ring-2 focus:ring-offset-2 focus:ring-primary-800 md:px-16 md:w-auto lg:mt-28 md:mt-12">
                    Load More
                </button>
            </div> --}}
        @endif
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            function showFilters() {
                var fSection = $("#filterSection");
                if (fSection.hasClass("hidden")) {
                    fSection.removeClass("hidden").addClass("block");
                } else {
                    fSection.addClass("hidden");
                }
            }

            function applyFilters() {
                $("input[type=checkbox]").prop("checked", false);
            }

            function closeFilterSection() {
                var fSection = $("#filterSection");
                fSection.addClass("hidden");
            }

            function sortPriceAsc() {
                // Sort cards in ascending order based on price
                $('.card').sort(function(a, b) {
                    var priceA = parseFloat($(a).find('.price').attr('price'));
                    var priceB = parseFloat($(b).find('.price').attr('price'));
                    return priceA - priceB;
                }).appendTo(
                    '#browse-container'
                ); // Replace '#browse-container' with the appropriate parent element selector
            }

            function sortPriceDesc() {
                // Sort cards in descending order based on price
                $('.card').sort(function(a, b) {
                    var priceA = parseFloat($(a).find('.price').attr('price'));
                    var priceB = parseFloat($(b).find('.price').attr('price'));
                    return priceB - priceA;
                }).appendTo(
                    '#browse-container'
                ); // Replace '#browse-container' with the appropriate parent element selector
            }

            function sortPrice() {
                var sort = $("#btn-sort").attr('sort');
                console.log({
                    sort: sort,
                    // icon: icon
                });

                if (sort == 'default') {
                    $("#btn-sort i").removeClass('fa-sort').addClass('fa-arrow-up-1-9');
                    $("#btn-sort").removeClass('text-gray-800').addClass('text-primary-500').attr('sort', 'asc');
                    sortPriceAsc()
                } else if (sort == 'asc') {
                    $("#btn-sort i").removeClass('fa-arrow-up-1-9').addClass('fa-arrow-down-9-1');
                    $("#btn-sort").attr('sort', 'desc');
                    sortPriceDesc()
                } else if (sort == 'desc') {
                    $("#btn-sort i").addClass('fa-arrow-up-1-9').removeClass('fa-arrow-down-9-1');
                    $("#btn-sort").attr('sort', 'asc');
                    sortPriceAsc()
                }
            }


            $("#btn-filter").click(function() {
                showFilters()
            })

            $("#close-filter").click(function() {
                closeFilterSection()
            });

            $("#btn-sort").click(function() {
                sortPrice()
            });

        })
    </script>
@endsection
