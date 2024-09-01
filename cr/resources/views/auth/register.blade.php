<x-guest-layout>
    <!-- Full-screen container with a background color -->
    <div class="back">
        <!-- Centered container with white background and some styling -->
        <div class="div-center">
            <div class="content">
                <h3 class="header">Register</h3>
                <hr class="divider" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group">
                        <!-- <x-input-label for="name" :value="__('Name')" class="label" /> -->
                        <x-text-input id="name" class="input"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your name" />
                        <x-input-error :messages="$errors->get('name')" class="error" />
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <!-- <x-input-label for="email" :value="__('Email')" class="label" /> -->
                        <x-text-input id="email" class="input"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            placeholder="Enter your email" />
                        <x-input-error :messages="$errors->get('email')" class="error" />
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                       <!-- <x-input-label for="password" :value="__('Password')" class="label" /> -->
                        <x-text-input id="password" class="input"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Enter your password" />
                        <x-input-error :messages="$errors->get('password')" class="error" />
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="form-group">
                        <!-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="label" /> -->
                        <x-text-input id="password_confirmation" class="input"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="error" />
                    </div>

                    <!-- Register Button -->
                    <div class="button-container">
                        <x-primary-button class="login-button">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

                    <!-- Already Registered Link -->
                    <div class="links">
                        <p class="register-link">Already have an account? 
                            <a href="{{ route('login') }}" class="link-text">Sign in</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Full-screen background container */
        .back {
            background: #e2e2e2;
            inline-size: 100%; /* full width */
            block-size: 100vh; /* full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            inset: 0;
        }

        /* Centered white container */
        .div-center {
            inline-size: 80%; /* increased width */
            max-inline-size: 450px; /* increased max width */
            block-size: auto; /* auto height */
            background-color: #fff;
            margin: auto;
            padding: 1.5em; /* restored padding */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Content within the container */
        .content {
            inline-size: 100%;
            block-size: auto;
            text-align: center;
        }

        /* Header styling */
        .header {
            font-size: 1.8rem; /* slightly reduced font size */
            font-weight: 600;
            color: #333;
            margin-block-end: 0.5rem; /* reduced bottom margin */
        }

        /* Divider styling */
        .divider {
            border: 0;
            block-size: 1px;
            background: #ddd;
            margin-block-end: 1rem; /* reduced bottom margin */
        }

        /* Form group styling */
        .form-group {
            margin-block-end: 1rem; /* reduced bottom margin */
            inline-size: 100%;
        }

        /* Label styling */
        .label {
            display: block;
            color: #555;
            font-size: 1rem; /* reduced font size */
            font-weight: 500;
            margin-block-end: 0.3rem; /* reduced bottom margin */
        }

        /* Input field styling */
        .input {
            block-size: 2.3rem; /* slightly reduced input height */
            inline-size: 90%; /* reduced width to fit inside container */
            padding: 0.4rem; /* reduced padding */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.9rem; /* reduced font size */
            color: #333;
            margin: auto; /* center input fields */
            display: block; /* make inputs behave like block elements */
        }

        /* Error message styling */
        .error {
            color: #e74c3c;
            font-size: 0.85rem; /* reduced font size */
            margin-block-start: 0.4rem; /* reduced top margin */
        }

        /* Button container */
        .button-container {
            text-align: center;
            margin-block-start: 1rem; /* reduced top margin */
        }

        /* Login button styling */
        .login-button {
            inline-size: 90%; /* reduced width to fit inside container */
            block-size: 2.5rem; /* slightly reduced button height */
            background-color: #3498db;
            color: #fff;
            font-weight: 600;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            margin: auto; /* center button */
            display: block; /* make button behave like block element */
        }

        .login-button:hover {
            background-color: #2980b9;
        }

        /* Links styling */
        .links {
            text-align: center;
            margin-block-start: 0.8rem; /* reduced top margin */
        }

        /* Register link styling */
        .register-link {
            font-size: 0.9rem; /* reduced font size */
            color: #555;
        }

        /* Forgot password link */
        .forgot-link, .link-text {
            color: #3498db;
            font-weight: 500;
            text-decoration: none;
            margin-block-start: 0.4rem; /* reduced top margin */
            display: inline-block;
        }

        .forgot-link:hover, .link-text:hover {
            text-decoration: underline;
        }
    </style>
</x-guest-layout>
