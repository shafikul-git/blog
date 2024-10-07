<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
</head>

<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-700 pt-9 sm:pt-10">
        <x-frontendNav />
        @yield('frontEnd')

    </div>

    @once
        @if (session('success') || session('error'))
            <x-alert id="alertClose" onclick="alertClose()" :success="session('success')" :error="session('error')"></x-alert>
        @endif
    @endonce

    <script src="{{ asset('js/frontend.js') }}"></script>

</body>

</html>
