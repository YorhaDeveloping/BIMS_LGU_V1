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
   
</head>

<body class="antialiased" style="background-image: url('{{ asset('logo/login.jpg') }}'); background-size: cover; background-position: center;
background-color: rgba(0, 0, 0,.7);">

    
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <img src="{{ asset('logo/bimsss.png') }}" alt="logo" style="width: 130px; height: 110px;">

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
</div>

</ul>

        </div>
    </nav>
    <div class="mt-4 p-5 text-center text-dark rounded">
      



<div style="text-align: center;">
    <h1 style="color: white; letter-spacing: 25px;">WELCOME!</h1>
</div>

<div style="text-align: center; color: white; font-family: 'Arial', sans-serif; margin-top: 50px;">
    <h4 style="margin: 0;">LGU - APARRI BUILDING INFORMATION MANAGEMENT SYSTEM</h4>
    <h6 style="margin: 0;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda</h6>
    <h6 style="margin: 0;">Mollitia voluptas ducimus explicabo saepe, beatae neque fuga eligendi</h6>
    <h6 style="margin: 0;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda</h6>
    <h6 style="margin: 0;">Mollitia voluptas ducimus explicabo saepe, beatae neque fuga eligendi</h6>
</div>

    </div>
</div>
</div>
</body>
</html>
