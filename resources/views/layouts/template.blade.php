<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- Estilos -->
    @vite(['resources/sass/app.scss','resources/css/app.css','resources/js/app.js'])

    @yield('assets')

    <title>@yield('title')</title>
</head>
<body class="@yield('bodyClass')" style="@yield('bodyStyle')">
    @yield('content')
</body>
</html>