@extends('layouts.app')
@section('body')
    <div class="w-full bg-primary-400">
        <div class="sm:hidden">
            @include('components.quick-nav')
        </div>
    </div>
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
