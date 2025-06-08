@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    }

    .glass-card {
        backdrop-filter: blur(10px);
        background: rgba(15, 15, 15, 0.75);
        border: 1px solid rgba(0, 255, 255, 0.2);
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
        max-width: 700px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .page-header h2 {
        color: #0ff;
        font-weight: 700;
    }

    /* Neon glass style button - apply for Back and Save buttons */
    .btn-neon {
        background-color: transparent;
        border: 2px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        padding: 0.5rem 1.6rem;
        border-radius: 0.6rem;
        transition: all 0.3s ease;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
        text-decoration: none;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        user-select: none;
    }

    .btn-neon:hover,
    .btn-neon:focus {
        background-color: #00ffff;
        color: #0f2027;
        box-shadow: 0 0 20px #00ffff;
        text-decoration: none;
        outline: none;
    }

    /* For button elements */
    button.btn-neon {
        border: 2px solid #00ffff;
    }

    /* Form inputs */
    .form-control {
        background-color: #000;
        color: #fff;
        border: 2px solid #00ffff;
        border-radius: 0.5rem;
        padding: 0.5rem 0.75rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus {
        border-color: #00ffff;
        box-shadow: 0 0 10px #00ffff;
        background-color: #000;
        color: #00ffff;
        outline: none;
    }
</style>

<div class="container py-5">
    <div class="page-header">
        <h2>➕ Add Student</h2>
        <a href="{{ route('students.index') }}" class="btn-neon btn-back btn-sm">
            ⬅️ Back to List
        </a>
    </div>

    <div class="card glass-card rounded-4 px-4 py-4 text-light">
        <form action="{{ route('students.store') }}" method="POST" novalidate>
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label text-info fw-semibold">👤 Name</label>
                <input type="text" name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" placeholder="Enter full name">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label text-info fw-semibold">📧 Email</label>
                <input type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="Enter email address">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label text-info fw-semibold">📱 Phone</label>
                <input type="text" name="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone') }}" placeholder="Enter phone number">
                @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Age -->
            <div class="mb-3">
                <label class="form-label text-info fw-semibold">🎂 Age</label>
                <input type="number" name="age"
                    class="form-control @error('age') is-invalid @enderror"
                    value="{{ old('age') }}" placeholder="Enter age">
                @error('age')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label class="form-label text-info fw-semibold">🏠 Address</label>
                <input type="text" name="address"
                    class="form-control @error('address') is-invalid @enderror"
                    value="{{ old('address') }}" placeholder="Enter address">
                @error('address')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn-neon btn-lg fw-semibold">
                    💾 Save Student
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
