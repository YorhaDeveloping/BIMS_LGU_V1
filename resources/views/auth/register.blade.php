<x-guest-layout>
    <style>
        .form_container {
            width: fit-content;
            height: fit-content;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 15px;
            padding: 50px 40px 20px 40px;
            background-color: #ffffff;
            box-shadow: 0px 106px 42px rgba(0, 0, 0, 0.01),
                0px 59px 36px rgba(0, 0, 0, 0.05), 0px 26px 26px rgba(0, 0, 0, 0.09),
                0px 7px 15px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
            border-radius: 11px;
            font-family: "Inter", sans-serif;
        }

        .logo_container {
            box-sizing: border-box;
            width: 80px;
            height: 80px;
            background: linear-gradient(180deg, rgba(248, 248, 248, 0) 50%, #F8F8F888 100%);
            border: 1px solid #F7F7F8;
            filter: drop-shadow(0px 0.5px 0.5px #EFEFEF) drop-shadow(0px 1px 0.5px rgba(239, 239, 239, 0.5));
            border-radius: 11px;
        }

        .title_container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 700;
            color: #212121;
        }

        .subtitle {
            font-size: 0.725rem;
            max-width: 80%;
            text-align: center;
            line-height: 1.1rem;
            color: #8B8E98
        }

        .input_container {
            width: 100%;
            height: fit-content;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .icon {
            width: 20px;
            position: absolute;
            z-index: 99;
            left: 12px;
            bottom: 9px;
        }

        .input_label {
            font-size: 0.75rem;
            color: #8B8E98;
            font-weight: 600;
        }

        .input_field {
            width: auto;
            height: 40px;
            padding: 0 0 0 40px;
            border-radius: 7px;
            outline: none;
            border: 1px solid #e5e5e5;
            filter: drop-shadow(0px 1px 0px #efefef) drop-shadow(0px 1px 0.5px rgba(239, 239, 239, 0.5));
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }

        .input_field:focus {
            border: 1px solid transparent;
            box-shadow: 0px 0px 0px 2px #242424;
            background-color: transparent;
        }

        .sign-in_btn {
            width: 100%;
            height: 40px;
            border: 0;
            background: #115DFC;
            border-radius: 7px;
            outline: none;
            color: #ffffff;
            cursor: pointer;
        }

        .sign-in_ggl {
            width: 100%;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #ffffff;
            border-radius: 7px;
            outline: none;
            color: #242424;
            border: 1px solid #e5e5e5;
            filter: drop-shadow(0px 1px 0px #efefef) drop-shadow(0px 1px 0.5px rgba(239, 239, 239, 0.5));
            cursor: pointer;
        }

        .sign-in_apl {
            width: 100%;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #212121;
            border-radius: 7px;
            outline: none;
            color: #ffffff;
            border: 1px solid #e5e5e5;
            filter: drop-shadow(0px 1px 0px #efefef) drop-shadow(0px 1px 0.5px rgba(239, 239, 239, 0.5));
            cursor: pointer;
        }

        .separator {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            color: #8B8E98;
        }

        .separator .line {
            display: block;
            width: 100%;
            height: 1px;
            border: 0;
            background-color: #e8e8e8;
        }

        .note {
            font-size: 0.75rem;
            color: #8B8E98;
            text-decoration: underline;
        }
    </style>
    <div class="form_container">
        <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <a href="/">
                <img src="{{ asset('logo/bims-logo.png') }}" alt="Logo" style="height: 10vh;">
            </a>
        </div>
        <div class="title_container">
            <p class="title">Register to LGU APARRI BIMS</p>
            <span class="subtitle">Get started with our Site, Login or Register Below!</span>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div class="input_container">
                <label class="input_label" for="name_field">Name</label>
                <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <input placeholder="John Doe" title="Name" name="name" type="text" class="input_field" id="name_field" :value="old('name')" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Field -->
            <div class="input_container">
                <label class="input_label" for="email_field">Email</label>
                <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M7 8.5L9.94202 10.2394C11.6572 11.2535 12.3428 11.2535 14.058 10.2394L17 8.5"></path>
                    <path stroke-linejoin="round" stroke-width="1.5" stroke="#141B34" d="M2.01577 13.4756C2.08114 16.5412 2.11383 18.0739 3.24496 19.2094C4.37608 20.3448 5.95033 20.3843 9.09883 20.4634C11.0393 20.5122 12.9607 20.5122 14.9012 20.4634C18.0497 20.3843 19.6239 20.3448 20.7551 19.2094C21.8862 18.0739 21.9189 16.5412 21.9842 13.4756C22.0053 12.4899 22.0053 11.5101 21.9842 10.5244C21.9189 7.45886 21.8862 5.92609 20.7551 4.79066C19.6239 3.65523 18.0497 3.61568 14.9012 3.53657C12.9607 3.48781 11.0393 3.48781 9.09882 3.53656C5.95033 3.61566 4.37608 3.65521 3.24495 4.79065C2.11382 5.92608 2.08114 7.45885 2.01576 10.5244C1.99474 11.5101 1.99475 12.4899 2.01577 13.4756Z"></path>
                </svg>
                <input placeholder="name@mail.com" title="Email" name="email" type="email" class="input_field" id="email_field" :value="old('email')" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password Field -->
            <div class="input_container">
                <label class="input_label" for="password_field">Password</label>
                <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M18 11.0041C17.4166 9.91704 16.273 9.15775 14.9519 9.0993C13.477 9.03404 11.9788 9 10.329 9C8.67911 9 7.18091 9.03404 5.70604 9.0993C3.95328 9.17685 2.51295 10.4881 2.27882 12.1618C2.12602 13.2541 2 14.3734 2 15.5134C2 16.6534 2.12602 17.7727 2.27882 18.865C2.51295 20.5387 3.95328 21.8499 5.70604 21.9275C6.42013 21.9591 7.26041 21.9834 8 22"></path>
                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M6 9V6.5C6 4.01472 8.01472 2 10.5 2C12.9853 2 15 4.01472 15 6.5V9"></path>
                </svg>
                <input placeholder="Password" title="Password" name="password" type="password" class="input_field" id="password_field" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password Field -->
            <div class="input_container">
                <label class="input_label" for="password_confirmation_field">Confirm Password</label>
                <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M18 11.0041C17.4166 9.91704 16.273 9.15775 14.9519 9.0993C13.477 9.03404 11.9788 9 10.329 9C8.67911 9 7.18091 9.03404 5.70604 9.0993C3.95328 9.17685 2.51295 10.4881 2.27882 12.1618C2.12602 13.2541 2 14.3734 2 15.5134C2 16.6534 2.12602 17.7727 2.27882 18.865C2.51295 20.5387 3.95328 21.8499 5.70604 21.9275C6.42013 21.9591 7.26041 21.9834 8 22"></path>
                    <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M6 9V6.5C6 4.01472 8.01472 2 10.5 2C12.9853 2 15 4.01472 15 6.5V9"></path>
                </svg>
                <input placeholder="Password" title="Confirm Password" name="password_confirmation" type="password" class="input_field" id="password_confirmation_field" required>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <br>
            <button title="Sign Up" type="submit" class="sign-in_btn">
                {{ __('Sign Up') }}
            </button>

            <!-- Separator -->
            <div class="separator">
                <hr class="line">
                <span>Or</span>
                <hr class="line">
            </div>

            <!-- Sign Up Link -->
            <a href="{{ route('login') }}" title="Sign Up" class="sign-in_apl">
                <span>Sign In</span>
            </a>
            <br>
            <p class="note" style="text-align: center;">Terms of use & Conditions</p>
        </form>
    </div>
</x-guest-layout>

