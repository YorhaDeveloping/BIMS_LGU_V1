<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Capstone') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <!-- bootstrap v5.3.2 -->
        <link rel="stylesheet" href="{{asset('build/bootstrap/bootstrap.v5.3.2.min.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.0.0/tailwind.min.css">

        @vite('resources/css/app.css')
    </head>

<body class="font-sans antialiased min-h-screen bg-gray-100"
     >

    <!-- renders here the navigation -->
    @include('layouts.Admin.navigation')

    <!-- Page Content -->
    <main>
        <!-- starts to render the blade content -->
        @yield('content')
</main>
</body>
</html>
