
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil | MARI Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f3f3ed;
            color: #252720;
            font-family: Arial, sans-serif;
        }
        .profile-card {
            max-width: 760px;
            margin: 45px auto;
            padding: 32px;
            background: #fff;
            border: 1px solid #deded5;
            border-radius: 14px;
        }
        .form-label { font-weight: 600; }
        .form-control { padding: 11px; }
        .btn-save {
            background: #b8e34b;
            border: none;
            color: #20251a;
            font-weight: 700;
        }
        .btn-save:hover { background: #a5d332; }
        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            background: #e8e8df;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Edit Profil</h3>
                <p class="text-muted mb-0">Perbarui informasi akun mahasiswa.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark">
                Kembali
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data berikut:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="text-center mb-4">
                @if ($user->profile_photo_path)
                    <img class="avatar"
                         src="{{ asset('storage/' . $user->profile_photo_path) }}"
                         alt="Foto profil">
                @else
                    <div class="avatar d-inline-flex align-items-center justify-content-center">
                        <span class="fs-2 fw-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </span>
                    </div>
                @endif

                <div class="mt-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="profile_photo"
                           class="form-control" accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">Format JPG, PNG, atau WEBP. Maksimal 2 MB.</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control"
                           value="{{ old('nim', $user->nim) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control"
                           value="{{ old('username', $user->username) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $user->email) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="birth_place" class="form-control"
                           value="{{ old('birth_place', $user->birth_place) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control"
                           value="{{ old('birth_date', $user->birth_date?->format('Y-m-d')) }}"
                           required>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    Batal
                </a>
                <button type="submit" class="btn btn-save px-4">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>


