<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog - @yield('title')</title>

   <link rel="shortcut icon" href="{{ asset('static-web/logo.png') }}" type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="{{ asset('css/tailwind.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/tailwind.js', 'resources/js/fontawesome.js'])
</head>

<body>

    @yield('otherConetent')

    @once
        @if (session('success') || session('error'))
            <x-alert id="alertClose" onclick="alertClose()" :success="session('success')" :error="session('error')"></x-alert>
        @endif
    @endonce

<script>
    function alertClose(){
        const alertClose = document.getElementById('alertClose');
        alertClose.style.display = 'none';
    }
</script>

</body>

</html>
