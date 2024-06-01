<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">

    @yield('style')
</head>
<body>

@include('client.blocks.navbar')

<main>
    @yield('content')
</main>

@include('client.blocks.footer')

<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/client/js/main.js') }}"></script>

@stack('script')
</body>
</html>
