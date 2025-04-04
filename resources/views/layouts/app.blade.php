<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TheDevHub - @yield('page_title', 'thedevhub')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-100 select-none relative">

    @include('layouts._partials.header')

    @include('layouts._partials.flash')

    <main class="container mx-auto px-3 md:px-5 min-h-[80vh] mb-10">

        <h2 class="font-black text-center text-2xl mb-10">@yield('page_title', 'thedevhub')</h2>

        @yield('main_content')

    </main>

    <footer class="border-t border-gray-300 ">
        <p class="p-4 capitalize text-gray-600 text-center text-sm md:text-lg">{{ now()->year }} - thedevhub all
            rights
            reserved &#169;.</p>
    </footer>
</body>

</html>
