@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #00ffff;
    }

    .glass-card {
        backdrop-filter: blur(15px);
        background: rgba(15, 15, 15, 0.75);
        border: 1px solid rgba(0, 255, 255, 0.3);
        box-shadow: 0 0 25px rgba(0, 255, 255, 0.3);
        border-radius: 1rem;
        padding: 2.5rem 3rem;
        max-width: 500px;
        width: 100%;
    }

    .glass-card h3 {
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 1.5rem;
        text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
    }

    label {
        color: #00ffff;
        font-weight: 600;
        margin-bottom: 0.4rem;
    }

    .form-control {
        background-color: rgba(0, 0, 0, 0.7);
        color: #ffffff;
        border: 1px solid #00ffff;
        border-radius: 0.5rem;
    }

    .form-control:focus {
        border-color: #00ffff;
        box-shadow: 0 0 10px #00ffff;
    }

    .btn-login {
        background-color: transparent;
        border: 2px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 0.6rem;
        transition: all 0.3s ease;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
    }

    .btn-login:hover {
        background-color: #00ffff;
        color: #0f2027;
        box-shadow: 0 0 20px #00ffff;
    }

    .form-check-label {
        color: #a0f0f0;
        font-weight: 500;
    }

    .invalid-feedback {
        color: #ff5c5c;
    }

    .text-center h3 span {
        font-size: 1.5rem;
    }
</style>

<div class="glass-card text-center">
    <h3><span>🔐</span> Welcome Back</h3>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3 text-start">
            <label for="email" class="form-label">📧 Email address</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus>

            @error('email')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3 text-start">
            <label for="password" class="form-label">🔑 Password</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required>

            @error('password')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-4 text-start">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    🧠 Remember Me
                </label>
            </div>
        </div>

        <!-- Submit -->
        <div class="d-grid">
            <button type="submit" class="btn btn-login">➡️ Login</button>
        </div>
    </form>
</div>
@endsection
