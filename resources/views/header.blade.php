<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog - @yield('title')</title>

    <link rel="shortcut icon"
        href="https://img.freepik.com/premium-vector/blog-abstract-concept-vector-illustration_107173-25627.jpg"
        type="image/x-icon">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
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

    <script src="https://kit.fontawesome.com/ed5a9b6893.js" crossorigin="anonymous"></script>
</body>

</html>
