@extends('layouts.app')

@section('title', 'Register')

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
        padding: 2rem;
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
        color: #00ffff;
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

    .btn-register {
        background-color: transparent;
        border: 2px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 0.6rem;
        transition: all 0.3s ease;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
    }

    .btn-register:hover {
        background-color: #00ffff;
        color: #0f2027;
        box-shadow: 0 0 20px #00ffff;
    }

    .invalid-feedback {
        color: #ff5c5c;
    }
</style>

<div class="glass-card text-center">
    <h3>📝 Register</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3 text-start">
            <label for="name" class="form-label">👤 Name</label>
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autofocus>

            @error('name')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3 text-start">
            <label for="email" class="form-label">📧 Email address</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required>

            @error('email')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3 text-start">
            <label for="password" class="form-label">🔒 Password</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required>

            @error('password')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4 text-start">
            <label for="password-confirm" class="form-label">🔁 Confirm Password</label>
            <input id="password-confirm" type="password"
                   class="form-control" name="password_confirmation" required>
        </div>

        <!-- Submit -->
        <div class="d-grid">
            <button type="submit" class="btn-register">✅ Register</button>
        </div>
    </form>
</div>
@endsection
