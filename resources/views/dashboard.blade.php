
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MONO | Student Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; }

        :root {
            --dark: #22251f;
            --lime: #d3ff70;
            --cream: #f2f1e9;
            --paper: #fffef8;
            --muted: #85897c;
            --line: #e1e1d7;
        }

        body {
            background: var(--cream);
            color: var(--dark);
            font-family: 'Space Grotesk', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 225px;
            height: 100vh;
            padding: 32px 23px 22px;
            background: var(--dark);
            color: white;
            display: flex;
            flex-direction: column;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            line-height: .95;
            letter-spacing: -2px;
        }

        .logo span { color: var(--lime); }

        .caption {
            color: #969b8e;
            font-size: 10px;
            letter-spacing: 1.5px;
            margin-top: 10px;
        }

        .menu { margin-top: 65px; }

        .menu-label {
            color: #858b7d;
            font-size: 10px;
            letter-spacing: 2px;
            margin: 0 0 15px 10px;
        }

        .menu a {
            display: block;
            padding: 13px;
            margin-bottom: 7px;
            border-radius: 7px;
            color: #c2c7ba;
            text-decoration: none;
            font-size: 14px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--lime);
            color: var(--dark);
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 18px;
            border-top: 1px solid #41453d;
        }

        .logout {
            width: 100%;
            padding: 14px;
            background: #30352c;
            border: 1px solid #454b3e;
            border-radius: 7px;
            color: #f0a69b;
            text-align: left;
            font: 14px 'Space Grotesk', sans-serif;
            cursor: pointer;
            transition: .2s;
        }

        .logout:hover {
            background: var(--lime);
            color: var(--dark);
        }

        /* MAIN */
        main {
            margin-left: 225px;
            padding: 30px clamp(24px, 4vw, 65px);
            min-height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 22px;
            border-bottom: 1px solid var(--line);
        }

        .eyebrow {
            color: var(--muted);
            font-size: 11px;
            letter-spacing: 1.5px;
        }

        header h3 {
            font-size: 18px;
            margin-top: 5px;
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            font-weight: 600;
        }

        .user-icon {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--lime);
            font-size: 18px;
        }

        /* HERO */
        .hero {
            margin-top: 28px;
            min-height: 320px;
            padding: 40px;
            background: var(--dark);
            color: white;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .tag {
            background: var(--lime);
            color: var(--dark);
            padding: 8px 12px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .hero h1 {
            font-size: clamp(48px, 5.5vw, 76px);
            line-height: .98;
            letter-spacing: -4px;
            margin: 25px 0 15px;
        }

        .hero h1 span { color: var(--lime); }

        .hero p {
            color: #bfc4b6;
            font-size: 15px;
            line-height: 1.7;
        }

        .shape {
            position: absolute;
            right: 13%;
            width: 155px;
            height: 155px;
            border: 1px solid var(--lime);
            transform: rotate(35deg);
            opacity: .55;
        }

        .shape::after {
            content: "";
            position: absolute;
            inset: 25px;
            border: 1px solid var(--lime);
        }

        /* SECTION */
        .section { margin-top: 38px; }

        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 17px;
        }

        .section-head h2 {
            font-size: 26px;
            letter-spacing: -1px;
        }

        .section-head small {
            color: var(--muted);
            font-size: 11px;
        }

        /* INFORMATION CARDS */
        .stats {
            display: grid;
            grid-template-columns: 1.2fr 1fr 1fr;
            gap: 15px;
        }

        .stat {
            min-height: 160px;
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 5px;
            padding: 24px;
            transition: .2s;
        }

        .stat:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px #20251a12;
        }

        .stat.primary {
            background: var(--lime);
            border-color: var(--lime);
        }

        .stat i { font-size: 23px; }

        .stat p {
            color: var(--muted);
            font-size: 12px;
            letter-spacing: 1px;
            margin-top: 22px;
        }

        .stat h3 {
            font-size: clamp(20px, 2vw, 28px);
            margin-top: 6px;
            overflow-wrap: anywhere;
        }

        /* PROFILE */
        .profile {
            display: grid;
            grid-template-columns: 270px 1fr;
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 5px;
            overflow: hidden;
        }

        .profile-side {
            padding: 30px;
            background: #e7e9dc;
        }

        .photo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            background: #d5d9c9;
            display: grid;
            place-items: center;
            font-size: 35px;
            border: 3px solid var(--paper);
        }

        .profile-side h3 {
            font-size: 24px;
            margin-top: 20px;
            overflow-wrap: anywhere;
        }

        .profile-side p {
            color: var(--muted);
            font-size: 13px;
            margin-top: 5px;
        }

        .verified {
            margin-top: 28px;
            font-size: 10px;
            color: #60783e;
            letter-spacing: 1px;
        }

        .profile-info { padding: 32px; }

        .profile-info h3 {
            font-size: 19px;
            margin-bottom: 25px;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px 30px;
        }

        .detail {
            border-bottom: 1px solid var(--line);
            padding-bottom: 13px;
            min-width: 0;
        }

        .detail small {
            color: var(--muted);
            font-size: 12px;
        }

        .detail strong {
            display: block;
            font-size: 16px;
            margin-top: 7px;
            overflow-wrap: anywhere;
        }

        footer {
            border-top: 1px solid var(--line);
            margin-top: 38px;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            color: var(--muted);
            font-size: 11px;
        }

        /* RESPONSIVE */
        @media(max-width: 850px) {
            .sidebar { width: 190px; padding: 25px 16px 20px; }
            main { margin-left: 190px; padding: 22px; }
            .profile { grid-template-columns: 220px 1fr; }
            .shape { right: -40px; opacity: .25; }
        }

        @media(max-width: 650px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: 0;
                padding: 20px;
            }

            .menu { margin-top: 25px; }
            .sidebar-bottom { margin-top: 20px; }
            main { margin: 0; padding: 20px 15px; }

            .stats,
            .profile,
            .details {
                grid-template-columns: 1fr;
            }

            .hero { padding: 28px 22px; min-height: 290px; }
            .hero h1 { font-size: 52px; letter-spacing: -3px; }
            .shape { right: -65px; }

            .section-head h2 { font-size: 23px; }
            footer { gap: 10px; flex-wrap: wrap; }
        }
    </style>
</head>

<body>

@php $user = Auth::user(); @endphp

<aside class="sidebar">
    <div>
        <div class="logo">MONO<span>.</span><br>SPACE</div>
        <div class="caption">YOUR PERSONAL WORKSPACE</div>
    </div>

    <nav class="menu">
        <div class="menu-label">MAIN MENU</div>
        <a href="{{ route('dashboard') }}" class="active">
            <i class="bi bi-grid me-2"></i> Dashboard
        </a>
        <a href="{{ route('profile.edit') }}">
            <i class="bi bi-person-badge me-2"></i> My Profile
        </a>
    </nav>

    <div class="sidebar-bottom">
        <div class="menu-label">ACCOUNT</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout">
                <i class="bi bi-box-arrow-left me-2"></i>
                Logout
            </button>
        </form>
    </div>
</aside>

<main>

    <header>
        <div>
            <div class="eyebrow">MONO SPACE / OVERVIEW</div>
            <h3>Welcome to your workspace.</h3>
        </div>

        <div class="user-chip">
            <div class="user-icon"><i class="bi bi-person"></i></div>
            {{ $user->username }}
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <span class="tag">✦ YOUR PERSONAL SPACE</span>
            <h1>Think.<br>Create.<br><span>Progress.</span></h1>
            <p>Welcome back, {{ $user->name }}. Make today a meaningful step forward.</p>
        </div>
        <div class="shape"></div>
    </section>

    <section class="section">
        <div class="section-head">
            <h2>Student Overview<span style="color:#91b83f">.</span></h2>
            <small>01 / YOUR INFORMATION</small>
        </div>

        <div class="stats">
            <div class="stat primary">
                <i class="bi bi-fingerprint"></i>
                <p>STUDENT NUMBER / NIM</p>
                <h3>{{ $user->nim }}</h3>
            </div>

            <div class="stat">
                <i class="bi bi-person"></i>
                <p>USERNAME</p>
                <h3>{{ $user->username }}</h3>
            </div>

            <div class="stat">
                <i class="bi bi-calendar-event"></i>
                <p>DATE OF BIRTH</p>
                <h3>{{ $user->birth_date ? $user->birth_date->format('d.m.Y') : '-' }}</h3>
            </div>
        </div>
    </section>

    <section class="section" id="profile">
        <div class="section-head">
            <h2>About You<span style="color:#91b83f">.</span></h2>
            <small>02 / PERSONAL IDENTITY</small>
        </div>

        <div class="profile">
            <div class="profile-side">
                @if($user->profile_photo_path)
                    <img src="{{ asset('storage/'.$user->profile_photo_path) }}" class="photo" alt="Foto profil">
                @else
                    <div class="photo"><i class="bi bi-person"></i></div>
                @endif

                <h3>{{ $user->name }}</h3>
                <p>@ {{ $user->username }}</p>
                <div class="verified">
                    <i class="bi bi-patch-check-fill"></i>
                    REGISTERED STUDENT
                </div>
            </div>

            <div class="profile-info">
                <h3>Personal Information</h3>

                <div class="details">
                    <div class="detail">
                        <small>Full Name</small>
                        <strong>{{ $user->name }}</strong>
                    </div>

                    <div class="detail">
                        <small>Student Number</small>
                        <strong>{{ $user->nim }}</strong>
                    </div>

                    <div class="detail">
                        <small>Username</small>
                        <strong>{{ $user->username }}</strong>
                    </div>

                    <div class="detail">
                        <small>Place of Birth</small>
                        <strong>{{ $user->birth_place }}</strong>
                    </div>

                    <div class="detail">
                        <small>Date of Birth</small>
                        <strong>{{ $user->birth_date ? $user->birth_date->format('d F Y') : '-' }}</strong>
                    </div>

                    <div class="detail">
                        <small>Email Address</small>
                        <strong>{{ $user->email ?: '-' }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <span>© {{ date('Y') }} MONO SPACE</span>
        <span>DESIGNED TO BE DIFFERENT.</span>
    </footer>

</main>

</body>
</html>


