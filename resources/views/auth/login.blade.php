<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <style>
            .input-group {
                position: relative;
            }
            .input-group .input-group-text {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 1;
                display: flex;
                align-items: center;
                padding: 0.5rem;
            }
            .input-group .form-control {
                padding-left: 2.5rem;
            }
            body, .text-center, .form-control, .input-group-text, label, a, span, h1 {
                color: black;
            }
        </style>

    <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
        <a href="">
            <img src="{{ asset('logo/aparri.png') }}" alt="Logo" style="height: 20vh;">
        </a>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <div class="input-group">
                <div class="input-group-text">
                <box-icon type='solid' name='user'></box-icon>
                </div>
                <x-text-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your Email" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="input-group">
                <div class="input-group-text">
                    <box-icon type='solid' name='lock'></box-icon>
                </div>
                <x-text-input id="password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Enter your Password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me and Forgot Password -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm hover:text-gray-900 ml-4" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-between mt-4 text-center p-2">
            <x-primary-button class="w-full flex items-center justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-guest-layout>
