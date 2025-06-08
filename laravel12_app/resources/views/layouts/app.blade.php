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
    </style>
</head>
<body class="bg-black text-white">

    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top px-4 py-2">
            <div class="container-fluid d-flex justify-content-between align-items-center position-relative">

                <!-- Centered Brand (Clean) -->
                <div class="position-absolute start-50 translate-middle-x">
                    <a>
                        🧑‍🎓 StudentApp
                    </a>
                </div>

                <!-- Right Side (Auth Links) -->
                <div class="ms-auto d-flex align-items-center">
                    @auth
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

        <!-- Page Content -->
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>

</body>
</html>
