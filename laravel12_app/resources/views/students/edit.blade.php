@extends('layouts.app')

@section('title', 'Edit Student')

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
        max-width: 650px;
        margin: 0 auto;
    }
</style>

<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="text-warning fw-bold">
            ✏️ Edit Student
        </h2>
        <a href="{{ route('students.index') }}" class="btn btn-outline-warning btn-sm">
            ⬅️ Back to List
        </a>
    </div>

    <!-- Glass Styled Edit Form -->
    <div class="card glass-card text-light rounded-4 px-4 py-4">
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label fw-semibold text-info">
                        👤 Name
                    </label>
                    <input type="text" name="name"
                        class="form-control bg-black text-white border-info @error('name') is-invalid @enderror"
                        value="{{ old('name', $student->name) }}" placeholder="Enter full name">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label fw-semibold text-info">
                        📧 Email
                    </label>
                    <input type="email" name="email"
                        class="form-control bg-black text-white border-info @error('email') is-invalid @enderror"
                        value="{{ old('email', $student->email) }}" placeholder="Enter email address">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label fw-semibold text-info">
                        📱 Phone
                    </label>
                    <input type="text" name="phone"
                        class="form-control bg-black text-white border-info @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $student->phone) }}" placeholder="Enter phone number">
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Age -->
                <div class="mb-3">
                    <label class="form-label text-info fw-semibold">
                        🎂 Age
                    </label>
                    <input type="number" name="age"
                        class="form-control bg-black text-white border-info @error('age') is-invalid @enderror"
                        value="{{ old('age', $student->age) }}" placeholder="Enter age">
                    @error('age')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label class="form-label text-info fw-semibold">
                        🏠 Address
                    </label>
                    <input type="text" name="address"
                        class="form-control bg-black text-white border-info @error('address') is-invalid @enderror"
                        value="{{ old('address', $student->address) }}" placeholder="Enter address">
                    @error('address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">
                        🔄 Update Student
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
