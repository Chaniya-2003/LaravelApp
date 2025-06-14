<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student App</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .app-title {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            color: #28a745; 
            margin-top: 2.5remrem;
        }
    </style>
</head>
<body class="bg-black text-white">

    <div id="app">
        
        <div class="app-title">
            🧑‍🎓Student App
        </div>

        <!-- Navbar -->
        
            <div class="container-fluid d-flex justify-content-between align-items-center">
            
                <div class="ms-auto d-flex align-items-center">
                   @auth
    <a href="{{ route('profile.edit') }}" class="btn btn-outline-info btn-sm me-2">
        👤 Profile
    </a>

    <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-light btn-sm me-2">
            🔓 Logout
        </button>
    </form>
@endauth

                </div>
            </div>
        </nav>

       
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>

</body>
</html>
