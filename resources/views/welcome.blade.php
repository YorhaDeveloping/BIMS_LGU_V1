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
    <link rel="stylesheet" href="{{asset('build/bootstrap/bootstrap.v5.3.2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background-image: url('{{ asset('backgrounds/building_background.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;

        }
    </style>

</head>

<body class="antialiased">

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center"
        style="height: 60px; background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(3px);">
        <!-- Logo -->
        <img src="{{ asset('logo/bimsss.png') }}" alt="logo" style="width: 120px; height: 100px; margin-top: 25px;">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-sm navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link" style="color: white;">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link" style="color: white;">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link" style="color: white;">Register</a>
                        </li>
                    @endif
                    @endauth
                @endif
            </ul>
        </nav>
    </div>
    <div class="mt-4 p-5 text-center text-dark rounded">
        <div class="card mx-auto d-flex justify-content-center align-items-center" style="width: 800px; height: 500px; background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(3px);">
            <div class="card-body text-center" style="margin-top: 100px;">
                <img src="{{ asset('logo/bims-logo.png') }}" alt="logo" style="width: 200px; height: 150px; display: block; margin: 0 auto;">
                <h1 style="color: black; letter-spacing: 25px;">WELCOME!</h1>
                <h5 style="margin: 0; color: black;">LGU - APARRI BUILDING INFORMATION MANAGEMENT SYSTEM</h5>
            </div>
        </div>
    </div>
</div>

</body>
</html>

