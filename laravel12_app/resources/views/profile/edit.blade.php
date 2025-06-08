@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        color: #00ffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .glass-card {
        backdrop-filter: blur(15px);
        background: rgba(15, 15, 15, 0.75);
        border: 1px solid rgba(0, 255, 255, 0.3);
        box-shadow: 0 0 25px rgba(0, 255, 255, 0.3);
        border-radius: 1rem;
        padding: 2rem;
        margin-top: 2rem;
    }

    h2.page-title {
        font-size: 2rem;
        font-weight: 700;
        text-shadow: 0 0 12px rgba(0, 255, 255, 0.7);
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-label {
        font-weight: 600;
        color: #a0f0f0;
    }

    .form-control {
        background-color: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(0, 255, 255, 0.3);
        color: #00ffff;
        box-shadow: inset 0 0 8px rgba(0, 255, 255, 0.2);
    }

    .form-control:focus {
        border-color: #00ffff;
        box-shadow: 0 0 10px #00ffff;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .btn-update {
        background-color: transparent;
        border: 2px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        padding: 0.5rem 1.2rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    .btn-update:hover {
        background-color: #00ffff;
        color: #0f2027;
        box-shadow: 0 0 15px #00ffff;
    }

    .alert-success {
        background: rgba(0, 255, 255, 0.15);
        border: 1px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
        border-radius: 0.6rem;
        text-align: center;
    }
</style>

<div class="container">
    <div class="glass-card mx-auto" style="max-width: 600px;">
        <h2 class="page-title">👤 Edit Profile</h2>

        @if (session('success'))
            <div class="alert alert-success mb-4">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="mb-4">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">New Password <small class="text-muted">(optional)</small></label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-update">💾 Update Profile</button>
        </form>
    </div>
</div>
@endsection
