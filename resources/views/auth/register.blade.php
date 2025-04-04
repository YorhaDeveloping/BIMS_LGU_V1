<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <x-guest-layout>
        <section class="bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Left side (same as login) -->
                <div class="relative flex items-end px-4 pb-10 pt-60 sm:pb-16 md:justify-center lg:pb-24 bg-gray-50 sm:px-6 lg:px-8">
                    <div class="absolute inset-0">
                        <img class="object-cover w-full h-full" src="{{ asset('backgrounds/building_background.jpg') }}" alt="" />
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                    <div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4">
                        <div style="background-color: white; padding: 10px; border-radius: 10px;">
                            <a href="{{ url('/') }}">
                            <img src="{{ asset('logo/bims-logo.png') }}" alt="logo" style="width: 200px; height: 150px;">
                        </a>
                        </div>
                    </div>
                    <div class="relative flex items-center justify-center">
                        <div class="w-full max-w-xl xl:w-full xl:mx-auto xl:pr-24 xl:max-w-xl">
                            <h3 class="text-4xl font-bold text-white">LGU APARRI BUILDING INFORMATION MANAGEMENT SYSTEM (BIMS)</h3>
                        </div>
                    </div>
                </div>

                <style>
                    .input_container {
                        position: relative;
                        margin-bottom: 1.5rem;
                    }

                    .input_field {
                        width: 100%;
                        padding: 1rem;
                        border: 1px solid #e2e8f0;
                        border-radius: 0.5rem;
                        font-size: 1rem;
                        transition: all 0.3s ease;
                        background-color: #f8fafc;
                    }

                    .input_field:focus {
                        border-color: #3b82f6;
                        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
                        outline: none;
                    }

                    .input_label {
                        display: block;
                        margin-bottom: 0.5rem;
                        font-weight: 500;
                        color: #4a5568;
                    }

                    .sign-in_btn {
                        background-color: #2563eb;
                        transition: all 0.3s ease;
                        font-weight: 600;
                    }

                    .sign-in_btn:hover {
                        background-color: #1d4ed8;
                        transform: translateY(-2px);
                    }

                    .separator {
                        position: relative;
                        margin: 2rem 0;
                    }

                    .separator span {
                        background-color: white;
                        padding: 0 1rem;
                        z-index: 1;
                    }

                    .logo-container {
                        background-color: white;
                        padding: 1.5rem;
                        border-radius: 1rem;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                        transition: all 0.3s ease;
                    }

                    .logo-container:hover {
                        transform: scale(1.05);
                    }
                </style>

                <!-- Right side (registration form) -->
                <div class="flex items-center justify-center px-4 py-10 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24">
                    <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                        <h2 class="text-3xl font-bold leading-tight text-gray-900 sm:text-4xl">Create Account</h2>
                        <p class="mt-2 text-base text-gray-600">Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 transition-all duration-200 hover:text-blue-700 hover:underline">Sign in</a></p>

                        <form class="mt-8" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="space-y-5">
                                <!-- Name Field -->
                                <div class="input_container">
                                    <label class="input_label" for="name_field">Full Name</label>
                                    <input placeholder="Enter your name" name="name" type="text" class="input_field" id="name_field" :value="old('name')" required autofocus>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Field -->
                                <div class="input_container">
                                    <label class="input_label" for="email_field">Email Address</label>
                                    <input placeholder="Enter your email" name="email" type="email" class="input_field" id="email_field" :value="old('email')" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password Field -->
                                <div class="input_container">
                                    <label class="input_label" for="password_field">Password</label>
                                    <input placeholder="Enter your password" name="password" type="password" class="input_field" id="password_field" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="input_container">
                                    <label class="input_label" for="password_confirmation_field">Confirm Password</label>
                                    <input placeholder="Confirm your password" name="password_confirmation" type="password" class="input_field" id="password_confirmation_field" required>
                                </div>

                                <button type="submit" class="sign-in_btn w-full py-3 px-4 text-white rounded-lg flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </x-guest-layout>

    <style>
        .input_container {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input_field {
            width: 100%;
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8fafc;
        }

        .input_field:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        .input_label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
        }

        .sign-in_btn {
            background-color: #2563eb;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .sign-in_btn:hover {
            background-color: #1d4ed8;
            transform: translateY(-2px);
        }

        .separator {
            position: relative;
            margin: 2rem 0;
        }

        .separator span {
            background-color: white;
            padding: 0 1rem;
            z-index: 1;
        }

        .logo-container {
            background-color: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .logo-container:hover {
            transform: scale(1.05);
        }
    </style>
</body>
</html>
