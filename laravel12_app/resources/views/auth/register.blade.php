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
        background: rgba(15, 15, 15, 0.85);
        border: 1px solid rgba(0, 255, 255, 0.2);
        box-shadow: 0 0 25px rgba(0, 255, 255, 0.15);
        border-radius: 1rem;
        padding: 2.5rem 3rem;
        max-width: 550px;
        width: 100%;
        color: #ffffff;
    }

    .glass-card h3 {
        text-shadow: 0 0 6px rgba(0, 200, 255, 0.6);
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

    .btn-primary {
        background-color: #00bfff;
        border: none;
        color: #0f2027;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #00a3cc;
    }

    .invalid-feedback {
        color: #ff5c5c;
    }
</style>

<div class="glass-card text-center">
    <h3 class="text-primary mb-4">📝 Register</h3>

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
            <button type="submit" class="btn btn-primary btn-lg">✅ Register</button>
        </div>
    </form>
</div>
@endsection
