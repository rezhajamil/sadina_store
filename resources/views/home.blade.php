@extends('layouts.app')
@section('body')
    @include('section.banner')
    <div class="w-full navigation bg-primary-300">
        <div class="sm:hidden">
            @include('components.quick-nav')
        </div>
    </div>

    @if ($news->count() > 0)
        @include('section.news')
    @endif
    @include('section.background')
    @include('section.event')
    @include('section.testimony')
    @include('section.profile')

    {{-- <div class="flex overflow-hidden justify-center p-2 mx-auto mt-6 rounded-full w-fit toggle-navigation">
        <span class="font-semibold text-black underline cursor-pointer toggle-nav-link">Show Navigation</span>
    </div> --}}
    @include('layouts.footer')
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
