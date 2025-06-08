@extends('layouts.app')

@section('title', 'Students List')

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
        padding: 1.5rem;
    }

    /* Heading Section */
    .page-header {
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .page-header h2 {
        font-weight: 700;
        font-size: 2.2rem;
        text-shadow: 0 0 12px rgba(0, 255, 255, 0.7);
        margin-bottom: 0.5rem;
    }

    /* Add Student Button */
    .btn-add-student {
        border: 2px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        padding: 0.45rem 1.4rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        background: transparent;
        box-shadow: 0 0 8px rgba(0, 255, 255, 0.4);
    }
    .btn-add-student:hover {
        background-color: #00ffff;
        color: #0f2027;
        box-shadow: 0 0 15px #00ffff;
        text-decoration: none;
    }

    /* Alert Success */
    .alert-success {
        background: rgba(0, 255, 255, 0.15);
        border: 1px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
        border-radius: 0.6rem;
    }

    /* Table Styles */
    table {
        border-collapse: separate !important;
        border-spacing: 0 10px !important;
        background: transparent;
    }

    thead.table-light {
        background: rgba(0, 255, 255, 0.15);
        color: #00ffff;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 700;
        font-size: 0.85rem;
        border-radius: 1rem;
        user-select: none;
    }

    thead.table-light th {
        border: none !important;
        padding: 12px 15px !important;
    }

    tbody tr {
        background: rgba(15, 15, 15, 0.75);
        border-radius: 0.8rem;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.15);
        transition: all 0.3s ease;
        cursor: default;
    }
    tbody tr:hover {
        background: rgba(0, 255, 255, 0.15);
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
        cursor: pointer;
    }

    tbody tr td {
        vertical-align: middle !important;
        padding: 12px 15px !important;
        color: #a0f0f0;
    }

    tbody tr td:first-child {
        font-weight: 600;
        color: #00ffff;
    }

    tbody tr td:last-child {
        text-align: center;
        white-space: nowrap;
    }

    /* Buttons inside table */
    .btn-outline-info, 
    .btn-outline-warning, 
    .btn-outline-danger {
        border-width: 2px;
        font-weight: 600;
        font-size: 0.85rem;
        padding: 0.35rem 0.9rem;
        border-radius: 0.5rem;
        box-shadow: 0 0 6px transparent;
        transition: all 0.3s ease;
    }

    .btn-outline-info {
        border-color: #00ffff;
        color: #00ffff;
    }
    .btn-outline-info:hover {
        background-color: #00ffff;
        color: #0f2027;
        box-shadow: 0 0 15px #00ffff;
    }

    .btn-outline-warning {
        border-color: #ffc107;
        color: #ffc107;
    }
    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: #0f2027;
        box-shadow: 0 0 15px #ffc107;
    }

    .btn-outline-danger {
        border-color: #ff4d4d;
        color: #ff4d4d;
    }
    .btn-outline-danger:hover {
        background-color: #ff4d4d;
        color: #0f2027;
        box-shadow: 0 0 15px #ff4d4d;
    }

    /* Pagination */
    .pagination {
        justify-content: flex-end !important;
        margin-top: 1.5rem;
    }

    .pagination .page-link {
        background-color: transparent;
        color: #00ffff;
        border: 1.5px solid #00ffff;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .pagination .page-link:hover, 
    .pagination .page-item.active .page-link {
        background-color: #00ffff;
        color: #0f2027;
        border-color: #00ffff;
        box-shadow: 0 0 10px #00ffff;
    }

    /* Responsive tweaks */
    @media (max-width: 576px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .btn-add-student {
            margin-top: 0.8rem;
        }
        tbody tr td:last-child {
            white-space: normal;
            text-align: left;
        }
    }
</style>

<div class="container py-5">

    <div class="page-header">
        <h2>📋 Students List</h2>
        <a href="{{ route('students.create') }}" class="btn btn-outline-info btn-add-student">
            ➕ Add Student
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ <strong>Success:</strong> {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card glass-card shadow-lg">
        <div class="table-responsive">
            <table class="table table-dark m-0 rounded">
                <thead class="table-light">
                    <tr>
                        <th class="px-3">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td class="px-3">{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->age ?? 'N/A' }}</td>
                            <td>{{ $student->address ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-warning btn-sm me-1" title="View Student">
                                    👁 View
                                </a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-info btn-sm me-1" title="Edit Student">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this student?')"
                                        title="Delete Student">
                                        🗑 Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-warning py-3">
                                🚫 No students found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        {{ $students->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
