@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4 mb-5 bg-dark text-white rounded" style="max-width: 400px; width: 100%; border: 1px solid #333;">
        <div class="card-body">
            <!-- Laravel logo -->
            <div class="text-center mb-4">
                <img src="{{ asset('images/Laravel-Logo.wine.svg') }}" alt="Laravel Logo" class="laravel-logo" style="width: 100px; height: auto;">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control bg-dark text-white border-secondary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control bg-dark text-white border-secondary @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-white" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-light text-dark">
                        {{ __('Log in') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <hr class="text-secondary">

                <div class="d-grid gap-2">
                    <a href="{{ route('login.google') }}" class="btn btn-light d-flex align-items-center justify-content-center">
                        <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo" width="20" class="me-2">
                        {{ __('Login with Google') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    /* Dark background for the entire page */
    body {
        background-color: #1c1f2b !important; /* Apply dark blue background */
    }

    .card {
        background-color: #2c2f38; /* Slightly darker card background */
        border-radius: 10px;
    }

    input.form-control {
        border-radius: 8px;
        padding: 10px;
    }

    .btn-light {
        background-color: #ffffff; /* White button */
        color: #121212; /* Dark text */
    }

    .btn-light:hover {
        background-color: #e6e6e6; /* Slight hover effect */
    }

    .invalid-feedback {
        font-size: 12px;
        color: red;
    }

    .form-check-label {
        color: #eaeaea; /* Light text for Remember Me */
    }

    hr {
        border-color: rgba(255, 255, 255, 0.1);
    }

    /* White Laravel logo */
    .laravel-logo {
        filter: brightness(0) invert(1); /* This makes the logo white */
    }
</style>
@endsection
