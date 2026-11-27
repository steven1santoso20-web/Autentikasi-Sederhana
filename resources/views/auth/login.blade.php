
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MARI Student Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f5f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,.08);
        }

        .login-header {
            background: #172554;
            color: white;
            padding: 30px;
            border-radius: 16px 16px 0 0;
        }
    </style>
</head>
<body>

<div class="container px-3">
    <div class="card login-card mx-auto">

        <div class="login-header text-center">
            <h2 class="fw-bold mb-1">MARI Student Portal</h2>
            <p class="mb-0">Silakan masuk ke akun Anda</p>
        </div>

        <div class="card-body p-4 p-md-5">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password"
                        required
                        autocomplete="current-password"
                    >

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        class="form-check-input"
                    >
                    <label for="remember" class="form-check-label">
                        Ingat saya
                    </label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Login
                    </button>
                </div>

                <p class="text-center mt-4 mb-0">
                    Belum memiliki akun?
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                </p>

                <div class="text-center mt-3">
                    <a href="{{ url('/') }}" class="text-decoration-none text-muted">
                        Kembali ke Beranda
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>


