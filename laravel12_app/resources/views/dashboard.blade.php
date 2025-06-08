@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        color: #00ffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .glass-card {
        backdrop-filter: blur(15px);
        background: rgba(15, 15, 15, 0.75);
        border: 1px solid rgba(0, 255, 255, 0.3);
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
        text-shadow: 0 0 12px rgba(0, 255, 255, 0.7);
    }

    p {
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
        color: #00ffff;
        text-shadow: 0 0 6px rgba(0, 255, 255, 0.5);
    }

    /* Neon glass style button for Login and Register */
    .btn-neon {
        background-color: transparent;
        border: 2px solid #00ffff;
        color: #00ffff;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 0.6rem;
        transition: all 0.3s ease;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
    }

    .btn-neon:hover {
        background-color: #00ffff;
        color: #0f2027;
        box-shadow: 0 0 20px #00ffff;
        text-decoration: none;
    }

    /* Logout button style */
    .btn-danger {
        background-color: #ff4d4d;
        color: #fff;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        border-radius: 0.6rem;
        border: none;
        box-shadow: 0 0 10px rgba(255, 77, 77, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #cc3a3a;
        box-shadow: 0 0 20px #cc3a3a;
    }

    .btn + .btn, .btn + form .btn, form .btn + .btn {
        margin-left: 1rem;
    }

    form.d-inline {
        display: inline;
    }
</style>

<div class="glass-card">
    <h1>Welcome to the Student Recorder App</h1>

    @auth
        <p>You are logged in as <strong>{{ auth()->user()->name }}</strong>.</p>
        <a href="{{ route('students.index') }}" class="btn btn-neon">Go to Dashboard</a>

        <form method="POST" action="{{ route('logout') }}" class="d-inline ms-3">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="btn btn-neon">Login</a>
        <a href="{{ route('register') }}" class="btn btn-neon">Register</a>
    @endguest
</div>
@endsection
