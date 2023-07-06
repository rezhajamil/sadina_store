@extends('layouts.app')
@section('body')
    <div class="w-full bg-primary-300 navigation">
        <div class="sm:hidden">
            @include('components.quick-nav')
        </div>
    </div>
    @include('section.banner')
    @include('section.background')
    {{-- <div class="flex justify-center p-2 mx-auto mt-6 overflow-hidden rounded-full w-fit toggle-navigation">
        <span class="font-semibold text-black underline cursor-pointer toggle-nav-link">Show Navigation</span>
    </div> --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var isScrolled = false;
            var navHeight = $(".navigation").height();
            console.log(navHeight);
            $(".toggle-nav-link").click(function() {
                isScrolled = !isScrolled;
                if (isScrolled) {
                    $(".navigation").animate({
                        opacity: 0,
                        height: 0,
                    }, 500);
                    $(".nav-link").animate({
                        opacity: 0,
                        height: 0,
                    }, 500).hide();
                    $(this).text("Show Navigation");
                } else {
                    $(".navigation").animate({
                        opacity: 1,
                        height: navHeight
                    }, 500);
                    $(".nav-link").animate({
                        opacity: 1,
                        height: navHeight
                    }, 500).show();
                    $(this).text("Hide Navigation");
                }
            });
        });
    </script>
@endsection
