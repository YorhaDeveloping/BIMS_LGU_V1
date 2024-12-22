<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <x-guest-layout>
        <section class="bg-white">
            <div class="grid grid-cols-1 lg:grid-cols-2">
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

                <div class="flex items-center justify-center px-4 py-10 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24">
                    <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl">Sign in to LGU APARRI - BIMS</h2>
                        <p class="mt-2 text-base text-gray-600">New here? <a href="{{ route('register') }}" title="Sign Up" class="font-medium text-blue-600 transition-all duration-200 hover:text-blue-700 focus:text-blue-700 hover:underline">Create an account</a></p>

                        <!-- Start of Login Form -->
                        <form class="mt-8" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="space-y-5">
                                <div class="input_container">
                                    <label class="input_label" for="email_field">Email</label>
                                    <input placeholder="name@mail.com" title="Email" name="email" type="email" class="input_field w-full" id="email_field" :value="old('email')" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="input_container">
                                    <label class="input_label" for="password_field">Password</label>
                                    <input placeholder="Password" title="Password" name="password" type="password" class="input_field w-full" id="password_field" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <button title="Sign In" type="submit" class="sign-in_btn w-full py-3 mt-6 text-white bg-blue-600 rounded-md">
                                    <span>Sign In</span>
                                </button>

                                <div class="separator flex items-center my-4">
                                    <hr class="w-full border-gray-300">
                                    <span class="px-3 text-gray-400">Or</span>
                                    <hr class="w-full border-gray-300">
                                </div>

                                <a href="{{ route('register') }}" title="Sign Up" class="block w-full text-center py-3 mt-4 bg-black rounded-md text-white">
                                    <span>Sign Up</span>
                                </a>
                            </div>
                        </form>
                        <!-- End of Login Form -->
                    </div>
                </div>
            </div>
        </section>
        </x-guest-layout>

</body>
</html>
