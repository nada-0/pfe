@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <form class="form-login" action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <h5>Welcome to our spot</h5>
            <div class="login">
                <a href="{{route('home')}}">
                    <i class="fas fa-arrow-left fa-arrow-left"></i>
                </a>
                <h2>Login</h2>
            </div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="username@gmail.com">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="{{ isset($showPassword) && $showPassword ? 'text' : 'password' }}" name="password" id="password" placeholder="password">
            <i class="fas {{ isset($showPassword) && $showPassword ? 'fa-eye-slash' : 'fa-eye' }} password-toggle" onclick="togglePassword()"></i>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="fp">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        <button type="submit">Sign In</button>
        <div class="switch1">
            <p>Don't have an account yet?</p>
            <a href="{{ route('register') }}" class="switch-register">Register for free</a>
        </div>
    </form>
</div>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var passwordToggle = document.querySelector(".password-toggle");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.classList.remove("fa-eye");
            passwordToggle.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            passwordToggle.classList.remove("fa-eye-slash");
            passwordToggle.classList.add("fa-eye");
        }
    }
</script>
@endsection
