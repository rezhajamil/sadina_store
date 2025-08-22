<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>Sadina | Modest Muslim Fashion and Ethnic Wear Store | Reliable and Trusted</title>

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Sadina | Modest Muslim Fashion and Ethnic Wear Store | Reliable and Trusted" />
    <meta property="og:description" content="Your trusted modest fashion and ethnic wear store." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ asset('images/logo.png') }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Sadina | Modest Muslim Fashion and Ethnic Wear Store | Reliable and Trusted" />
    <meta name="twitter:description" content="Your trusted modest fashion and ethnic wear store." />
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}" />

    <link rel="icon" href="{{ asset('images/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/b2ba1193ce.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation', ['carts' => $carts ?? null, 'cart_count' => $cart_count ?? 0])

        <!-- Page Content -->
        <main>
            @yield('body')
        </main>
    </div>
    @yield('script')
</body>

</html>
