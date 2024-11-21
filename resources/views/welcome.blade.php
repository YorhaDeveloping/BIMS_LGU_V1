<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Capstone') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/bootstrap/bootstrap.v5.3.2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('backgrounds/building_background.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;

        }
    </style>

</head>

<body class="antialiased">
    <header style="background-color: white;">
        <div class="px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <div class="flex-shrink-0">
                    <a href="#" title="" class="flex">
                        <img class="w-auto h-12"
                            src="{{ asset('logo/bims-logo.png') }}"
                            alt="" />
                    </a>
                </div>

                <button type="button"
                    class="inline-flex p-1 text-black transition-all duration-200 border border-black lg:hidden focus:bg-gray-100 hover:bg-gray-100">
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div class="hidden ml-auto lg:flex lg:items-center lg:justify-center lg:space-x-10">
                    {{-- <a href="#" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80"> Features </a>

                <a href="#" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80"> Solutions </a>

                <a href="#" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80"> Resources </a>

                <a href="#" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80"> Pricing </a> --}}

                    <div class="w-px h-5 bg-black/20"></div>
                    @if (Route::has('login'))
                        @auth

                            <a href="{{ url('/dashboard') }}"
                                class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80"
                                style="color: black;">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80"
                                style="color: black;">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80"
                                    style="color: black;">Register</a>
                            @endif
                        @endauth
                    @endif


                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">

        <div class="mt-4 p-5 text-center text-dark rounded">
            <div class="card mx-auto d-flex justify-content-center align-items-center"
                style="width: 800px; height: 500px; background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(3px);">
                <div class="card-body text-center" style="margin-top: 100px;">
                    <img src="{{ asset('logo/bims-logo.png') }}" alt="logo"
                        style="width: 200px; height: 150px; display: block; margin: 0 auto;">
                    <h1 style="color: black; letter-spacing: 25px;">WELCOME!</h1>
                    <h5 style="margin: 0; color: black;">LGU - APARRI BUILDING INFORMATION MANAGEMENT SYSTEM</h5>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
