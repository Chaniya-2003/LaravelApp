@extends('layouts.app')

@section('title', 'Edit Student')

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
        max-width: 700px;
        margin: 0 auto;
    }

    .form-label {
        font-weight: 600;
        color: #00ffff;
        margin-bottom: 0.3rem;
    }

    .form-control {
        background: rgba(0, 0, 0, 0.85);
        color: #a0f0f0;
        border: 2px solid #00ffff;
        border-radius: 0.5rem;
    }

    .form-control:focus {
        border-color: #00ffff;
        box-shadow: 0 0 12px rgba(0, 255, 255, 0.5);
    }

    .invalid-feedback {
        color: #ff4d4d;
    }

    .btn-update {
        background-color: #00ffff;
        color: #0f2027;
        font-weight: 600;
        border-radius: 0.5rem;
        padding: 0.6rem 1.2rem;
        border: none;
        box-shadow: 0 0 10px #00ffff;
        transition: 0.3s ease;
    }

    .btn-update:hover {
        background-color: #0f2027;
        color: #00ffff;
        border: 2px solid #00ffff;
        box-shadow: 0 0 15px #00ffff;
    }

    .back-btn {
        border: 2px solid #ffc107;
        color: #ffc107;
        padding: 0.4rem 1.1rem;
        border-radius: 0.5rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 0 8px rgba(255, 193, 7, 0.3);
    }

    .back-btn:hover {
        background-color: #ffc107;
        color: #0f2027;
        box-shadow: 0 0 15px #ffc107;
        text-decoration: none;
    }

    .form-title {
        text-shadow: 0 0 12px rgba(0, 255, 255, 0.7);
        font-size: 2rem;
        font-weight: 700;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="form-title text-info">✏️ Edit Student</h2>
        <a href="{{ route('students.index') }}" class="back-btn">
            ⬅️ Back to List
        </a>
    </div>

    
    <div class="card glass-card text-light rounded-4">
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">👤 Name</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $student->name) }}" placeholder="Enter full name">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">📧 Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $student->email) }}" placeholder="Enter email address">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

             
                <div class="mb-3">
                    <label class="form-label">📱 Phone</label>
                    <input type="text" name="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $student->phone) }}" placeholder="Enter phone number">
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">🎂 Age</label>
                    <input type="number" name="age"
                        class="form-control @error('age') is-invalid @enderror"
                        value="{{ old('age', $student->age) }}" placeholder="Enter age">
                    @error('age')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">🏠 Address</label>
                    <input type="text" name="address"
                        class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address', $student->address) }}" placeholder="Enter address">
                    @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-update btn-lg">
                        🔄 Update Student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
