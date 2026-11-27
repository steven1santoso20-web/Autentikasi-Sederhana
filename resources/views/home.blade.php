<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MARI Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark" style="background:#172554">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">MARI Student Portal</a>
        <div>
            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
        </div>
    </div>
</nav>

<section class="container text-center py-5">
    <div class="py-5">
        <h1 class="display-4 fw-bold">Welcome to MARI Student Portal</h1>
        <p class="lead text-secondary mt-3">
            Platform autentikasi dan pengelolaan data mahasiswa.
        </p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">
            Mulai Sekarang
        </a>
    </div>
</section>

<footer class="text-center py-4 text-secondary">
    &copy; {{ date('Y') }} MARI Student Portal
</footer>

</body>
</html>
