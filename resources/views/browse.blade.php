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
        </div>

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
