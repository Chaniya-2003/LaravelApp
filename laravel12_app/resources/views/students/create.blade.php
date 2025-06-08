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

    .btn-back {
        border-color: #0ff;
        color: #0ff;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    .btn-back:hover {
        background-color: #0ff;
        color: #000;
    }
</style>

<div class="container py-5">
    <div class="page-header">
        <h2>➕ Add Student</h2>
        <a href="{{ route('students.index') }}" class="btn btn-outline-info btn-back btn-sm">
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
                    class="form-control bg-black text-white border-info @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" placeholder="Enter full name">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label text-info fw-semibold">📧 Email</label>
                <input type="email" name="email"
                    class="form-control bg-black text-white border-info @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="Enter email address">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label text-info fw-semibold">📱 Phone</label>
                <input type="text" name="phone"
                    class="form-control bg-black text-white border-info @error('phone') is-invalid @enderror"
                    value="{{ old('phone') }}" placeholder="Enter phone number">
                @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Age -->
            <div class="mb-3">
                <label class="form-label text-info fw-semibold">🎂 Age</label>
                <input type="number" name="age"
                    class="form-control bg-black text-white border-info @error('age') is-invalid @enderror"
                    value="{{ old('age') }}" placeholder="Enter age">
                @error('age')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label class="form-label text-info fw-semibold">🏠 Address</label>
                <input type="text" name="address"
                    class="form-control bg-black text-white border-info @error('address') is-invalid @enderror"
                    value="{{ old('address') }}" placeholder="Enter address">
                @error('address')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn btn-info btn-lg fw-semibold">
                    💾 Save Student
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
