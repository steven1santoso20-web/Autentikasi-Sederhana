
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | MARI Student Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3f5f9;
            min-height: 100vh;
        }

        .register-card {
            max-width: 850px;
            margin: 45px auto;
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,.08);
        }

        .register-header {
            background: #172554;
            color: white;
            padding: 28px;
            border-radius: 16px 16px 0 0;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card register-card">

        <div class="register-header text-center">
            <h2 class="fw-bold mb-1">MARI Student Portal</h2>
            <p class="mb-0">Buat akun mahasiswa baru</p>
        </div>

        <div class="card-body p-4 p-md-5">

            <form method="POST"
                  action="{{ route('register') }}"
                  enctype="multipart/form-data">

                @csrf

                <h5 class="fw-bold mb-3">Identitas Mahasiswa</h5>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" name="nim" id="nim"
                               class="form-control @error('nim') is-invalid @enderror"
                               value="{{ old('nim') }}" required>
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username"
                               class="form-control @error('username') is-invalid @enderror"
                               value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="birth_place" class="form-label">Tempat Lahir</label>
                        <input type="text" name="birth_place" id="birth_place"
                               class="form-control @error('birth_place') is-invalid @enderror"
                               value="{{ old('birth_place') }}" required>
                        @error('birth_place')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="birth_date" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birth_date" id="birth_date"
                               class="form-control @error('birth_date') is-invalid @enderror"
                               value="{{ old('birth_date') }}" required>
                        @error('birth_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Informasi Akun</h5>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email (Opsional)</label>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="profile_photo" class="form-label">Foto Profil (Opsional)</label>
                        <input type="file" name="profile_photo" id="profile_photo"
                               class="form-control @error('profile_photo') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png,.webp">
                        @error('profile_photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format JPG, PNG, WEBP. Maksimal 2 MB.</small>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                               id="password_confirmation"
                               class="form-control" required>
                    </div>

                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Daftar Sekarang
                    </button>
                </div>

                <p class="text-center mt-4 mb-0">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}">Login di sini</a>
                </p>

            </form>
        </div>
    </div>
</div>

</body>
</html>


