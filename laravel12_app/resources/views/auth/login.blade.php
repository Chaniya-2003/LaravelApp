@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .glass-card {
        backdrop-filter: blur(10px);
        background: rgba(15, 15, 15, 0.8);
        border: 1px solid rgba(0, 255, 255, 0.2);
        box-shadow: 0 0 25px rgba(0, 255, 255, 0.2);
        border-radius: 1rem;
        padding: 2rem 3rem;
        max-width: 500px;
        width: 100%;
        color: #ffffff;
    }

    .glass-card h3 {
        text-shadow: 0 0 6px rgba(0, 255, 0, 0.6);
    }

    label {
        color: #00ffff;
        font-weight: 500;
    }

    .form-control {
        background-color: rgba(0, 0, 0, 0.8);
        color: #ffffff;
        border: 1px solid #00ffff;
    }

    .form-control:focus {
        border-color: #00ffff;
        box-shadow: 0 0 0 0.2rem rgba(0, 255, 255, 0.25);
    }

    .btn-success {
        background-color: #00ffcc;
        border: none;
        color: #0f2027;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #00e6b8;
    }

    .form-check-label {
        color: #ccc;
    }

    .invalid-feedback {
        color: #ff5c5c;
    }
</style>

<div class="glass-card text-center">
    <h3 class="text-success mb-4">🔒 Login</h3>

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
            <button type="submit" class="btn btn-success btn-lg">➡️ Login</button>
        </div>
    </form>
</div>
@endsection
