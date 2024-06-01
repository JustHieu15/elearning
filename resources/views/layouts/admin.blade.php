<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
    <script src="{{ asset('assets/admin/js/maindashboard.js') }}" defer></script>
</head>
<body class="bg-gray-900">
@include('admin.blocks.sidebar')

<main>
    @yield('content')
</main>

@stack('script')
</body>
</html>
