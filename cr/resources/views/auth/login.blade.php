<x-guest-layout>
    <!-- Full-screen container with a background color -->
    <div class="back">
        <!-- Centered container with white background and some styling -->
        <div class="div-center">
            <div class="content">
                <h3 class="header">Login</h3>
                <hr class="divider" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Field -->
                    <div class="form-group">
                        <!-- <x-input-label for="email" :value="__('Email')" class="label" /> -->
                        <x-text-input id="email" class="input"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
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
                            autocomplete="current-password"
                            placeholder="Enter your password" />
                        <x-input-error :messages="$errors->get('password')" class="error" />
                    </div>

                    <!-- Login Button -->
                    <div class="button-container">
                        <x-primary-button class="login-button">
                            {{ __('Sign in') }}
                        </x-primary-button>
                    </div>

                    <!-- Register and Forgot Password Links -->
                    <div class="links">
                        <p class="register-link">Don't have an account? 
                            <a href="{{ route('register') }}" class="link-text">Sign Up</a>
                        </p>
                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
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
            inline-size: 90%;
            max-inline-size: 400px; /* Adjusted to increase the width of the container */
            block-size: auto; /* auto height */
            background-color: #fff;
            margin: auto;
            padding: 2em;
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
            font-size: 2.2rem;
            font-weight: 600;
            color: #333;
            margin-block-end: 1rem;
        }

        /* Divider styling */
        .divider {
            border: 0;
            block-size: 1px;
            background: #ddd;
            margin-block-end: 1.5rem;
        }

        /* Form group styling */
        .form-group {
            margin-block-end: 1.5rem;
            inline-size: 100%;
        }

        /* Label styling */
        .label {
            display: block;
            color: #555;
            font-size: 1.1rem;
            font-weight: 500;
            margin-block-end: 0.5rem;
        }

        /* Input field styling */
        .input {
            block-size: 2.5rem;
            inline-size: 90%; /* Reduced input width for more padding */
            max-inline-size: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            color: #333;
        }

        /* Error message styling */
        .error {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-block-start: 0.5rem;
        }

        /* Button container */
        .button-container {
            text-align: center;
            margin-block-start: 1.5rem;
        }

        /* Login button styling */
        .login-button {
            inline-size: 60%; /* Adjusted width to make it shorter */
            block-size: 2.75rem;
            background-color: #3498db;
            color: #fff;
            font-weight: 600;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #2980b9;
        }

        /* Links styling */
        .links {
            text-align: center;
            margin-block-start: 1rem;
        }

        /* Register link styling */
        .register-link {
            font-size: 0.95rem;
            color: #555;
        }

        /* Forgot password link */
        .forgot-link, .link-text {
            color: #3498db;
            font-weight: 500;
            text-decoration: none;
            margin-block-start: 0.5rem;
            display: inline-block;
        }

        .forgot-link:hover, .link-text:hover {
            text-decoration: underline;
        }
    </style>
</x-guest-layout>
