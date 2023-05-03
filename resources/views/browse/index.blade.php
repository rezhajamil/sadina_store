@extends('layouts.app')
@section('body')
    <div class="px-4 py-6 lg:px-20 md:px-6">
        <p class="text-sm font-normal leading-3 text-gray-600">
            Browse
        </p>
        <hr class="w-full my-6 bg-gray-200" />

        <div class="flex flex-wrap items-center justify-between gap-y-4">
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
                class="text-base font-normal leading-4 text-gray-600 transition-all duration-100 cursor-pointer hover:underline hover:text-primary-500">
                Showing 18 products
            </p>
        </div>
        <x-filter></x-filter>
        @foreach ($products as $key => $product)
            <x-product-card :product="$product"></x-product-card>
        @endforeach

        <div class="flex items-center justify-center">
            <button
                class="w-full py-5 mt-10 text-base font-medium leading-4 text-white bg-primary-800 hover:bg-primary-700 focus:ring-2 focus:ring-offset-2 focus:ring-primary-800 md:px-16 md:w-auto lg:mt-28 md:mt-12">
                Load More
            </button>
        </div>
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

            function sortPrice() {
                var sort = $("#btn-sort").attr('sort');
                console.log({
                    sort: sort,
                    // icon: icon
                });

                if (sort == 'default') {
                    $("#btn-sort i").removeClass('fa-sort').addClass('fa-arrow-up-1-9');
                    $("#btn-sort").removeClass('text-gray-800').addClass('text-primary-500').attr('sort', 'asc');
                } else if (sort == 'asc') {
                    $("#btn-sort i").removeClass('fa-arrow-up-1-9').addClass('fa-arrow-down-9-1');
                    $("#btn-sort").attr('sort', 'desc');
                } else if (sort == 'desc') {
                    $("#btn-sort i").addClass('fa-arrow-up-1-9').removeClass('fa-arrow-down-9-1');
                    $("#btn-sort").attr('sort', 'asc');
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
