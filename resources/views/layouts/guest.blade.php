<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans  antialiased">
        <div class="min-h-screen bg-center flex justify-center items-center"
        style="
        background-image: url('{{asset('backgrounds/building_background_login.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;">
            {{--
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg"
     style="background: transparent; border: 2px solid rgba(255, 255, 255, .2); backdrop-filter: blur(9px); box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
    {{ $slot }}
</div>

        </div>
    </body>
</html>
