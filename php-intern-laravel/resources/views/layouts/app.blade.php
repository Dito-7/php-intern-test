<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <h1 class="mb-0">Employee Management</h1>
        </div>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="bg-light py-3 mt-5">
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} Laravel Intern Test</small>
        </div>
    </footer>
</body>
</html>