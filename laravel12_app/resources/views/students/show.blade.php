@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        color: #00ffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    .glass-card {
        backdrop-filter: blur(15px);
        background: rgba(15, 15, 15, 0.75);
        border: 1.5px solid rgba(0, 255, 255, 0.3);
        box-shadow: 0 0 25px rgba(0, 255, 255, 0.3);
        max-width: 600px;
        margin: 0 auto;
        border-radius: 1rem;
        padding: 2rem 2.5rem;
    }

    /* Headings */
    h2.text-info {
        font-weight: 700;
        font-size: 2rem;
        text-shadow: 0 0 12px rgba(0, 255, 255, 0.7);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #00ffff !important;
    }

    /* Neon glass style button - for Back to List */
    .btn-neon {
        background-color: transparent;
        border: 2px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        padding: 0.35rem 1.2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0 8px rgba(0, 255, 255, 0.4);
        transition: all 0.3s ease;
        user-select: none;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
        text-align: center;
    }
    .btn-neon:hover,
    .btn-neon:focus {
        background-color: #00ffff;
        color: #0f2027;
        box-shadow: 0 0 15px #00ffff;
        outline: none;
        text-decoration: none;
    }

    /* Labels */
    h6.text-info {
        text-transform: uppercase;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        margin-bottom: 0.25rem;
        user-select: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #00ffff !important;
    }

    /* Values */
    p.fs-6 {
        font-size: 1.1rem;
        font-weight: 500;
        color: #a0f0f0;
        margin-left: 1.5rem;
        line-height: 1.4;
        margin-bottom: 1rem;
    }

    /* Icons */
    h6.text-info i {
        font-size: 1.2rem;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .glass-card {
            padding: 1.5rem 1.8rem;
            margin: 1.5rem 1rem;
        }
        p.fs-6 {
            font-size: 1rem;
            margin-left: 1rem;
            margin-bottom: 0.75rem;
        }
        .btn-neon {
            font-size: 0.9rem;
            padding: 0.3rem 1rem;
        }
    }
</style>

<div class="container py-4">
    <div class="text-center mb-4">
        <h2 class="text-info fw-bold">
            <i class="bi bi-person-circle me-2 fs-2"></i>Student Details
        </h2>
        <a href="{{ route('students.index') }}" class="btn-neon btn-sm mt-2">
            ← Back to List
        </a>
    </div>

    <div class="card glass-card text-start rounded-4">
        <div class="card-body">

            <div>
                <h6 class="text-info small mb-1">
                    <i class="bi bi-person-fill me-2"></i>Name
                </h6>
                <p class="fs-6">{{ $student->name }}</p>
            </div>

            <div>
                <h6 class="text-info small mb-1">
                    <i class="bi bi-envelope-fill me-2"></i>Email
                </h6>
                <p class="fs-6">{{ $student->email }}</p>
            </div>

            <div>
                <h6 class="text-info small mb-1">
                    <i class="bi bi-telephone-fill me-2"></i>Phone
                </h6>
                <p class="fs-6">{{ $student->phone }}</p>
            </div>

            <div>
                <h6 class="text-info small mb-1">
                    <i class="bi bi-cake me-2"></i>Age
                </h6>
                <p class="fs-6">{{ $student->age ?? 'N/A' }}</p>
            </div>

            <div>
                <h6 class="text-info small mb-1">
                    <i class="bi bi-geo-alt-fill me-2"></i>Address
                </h6>
                <p class="fs-6">{{ $student->address ?? 'N/A' }}</p>
            </div>

        </div>
    </div>
</div>
@endsection
