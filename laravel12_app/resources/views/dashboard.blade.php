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
        backdrop-filter: blur(12px);
        background: rgba(15, 15, 15, 0.8);
        border: 1px solid rgba(0, 255, 255, 0.25);
        box-shadow: 0 0 25px rgba(0, 255, 255, 0.3);
        border-radius: 1rem;
        padding: 3rem 4rem;
        max-width: 450px;
        width: 100%;
        color: #00ffff;
        text-align: center;
    }

    h1 {
        font-weight: 700;
        margin-bottom: 2rem;
        color: #00ffff;
        text-shadow: 0 0 8px rgba(0, 255, 255, 0.6);
    }

    .btn-primary {
        background-color: #00ffff;
        border: none;
        color: #0f2027;
        font-weight: 600;
        padding: 0.6rem 1.6rem;
        border-radius: 0.5rem;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #00cccc;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        font-weight: 600;
        padding: 0.6rem 1.6rem;
        border-radius: 0.5rem;
        transition: background-color 0.3s ease;
        color: #fff;
    }
    .btn-success:hover {
        background-color: #218838;
    }

    .btn-info {
        background-color: transparent;
        border: 2px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }
    .btn-info:hover {
        background-color: #00ffff;
        color: #0f2027;
    }

    .btn-danger {
        background-color: #ff4d4d;
        border: none;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        transition: background-color 0.3s ease;
        color: #fff;
    }
    .btn-danger:hover {
        background-color: #cc3a3a;
    }

    .btn + .btn {
        margin-left: 1rem;
    }

    p {
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
        color: #00ffff;
        text-shadow: 0 0 6px rgba(0, 255, 255, 0.5);
    }

</style>

<div class="glass-card">
    <h1>Welcome to the Student Recorder App</h1>

    @auth
        <p>You are logged in as <strong>{{ auth()->user()->name }}</strong>.</p>
        <a href="{{ route('students.index') }}" class="btn btn-info">Go to Dashboard</a>

        <form method="POST" action="{{ route('logout') }}" class="d-inline ms-3">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    @endauth

    @guest
        
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
    @endguest
</div>
@endsection
