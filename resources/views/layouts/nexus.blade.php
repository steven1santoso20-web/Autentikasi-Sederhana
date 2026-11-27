<!doctype html>
<html lang="id" data-theme="{{ auth()->user()->theme ?? 'light' }}">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MARI Dashboard') | MARI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    :root{--ink:#22251f;--lime:#d3ff70;--cream:#f2f1e9;--paper:#fffef8;--muted:#85897c;--line:#e1e1d7;--side:#22251f}
    [data-theme="dark"]{--ink:#edf0e7;--cream:#171a16;--paper:#222720;--muted:#a4aa9a;--line:#394035;--side:#10130f}
    *{box-sizing:border-box}body{margin:0;background:var(--cream);color:var(--ink);font-family:'Space Grotesk',sans-serif;font-size:14px}
    a{color:inherit}.sidebar{position:fixed;inset:0 auto 0 0;width:238px;background:var(--side);color:#fff;padding:28px 18px;display:flex;flex-direction:column;z-index:20;overflow:auto}
    .brand{font-size:27px;font-weight:700;letter-spacing:-1.8px;padding:0 12px}.brand span{color:var(--lime)}.brand small{display:block;font-size:9px;letter-spacing:2px;color:#92998b;margin-top:5px}
    .nav-caption{font-size:10px;letter-spacing:1.7px;color:#899083;margin:30px 12px 10px}.side-link{display:flex;align-items:center;gap:12px;padding:11px 12px;border-radius:8px;color:#c8cec0;text-decoration:none;margin:3px 0;font-size:13px}.side-link i{font-size:16px}.side-link:hover,.side-link.active{background:var(--lime);color:#20251a}.side-bottom{margin-top:auto;padding-top:18px;border-top:1px solid #41473e}.logout{width:100%;border:1px solid #454b40;background:#30352d;color:#f2b4a9;padding:11px;border-radius:8px;text-align:left}
    main{margin-left:238px;padding:28px clamp(20px,4vw,54px);min-height:100vh}.topbar{display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--line);padding-bottom:18px}.eyebrow{color:var(--muted);font-size:10px;letter-spacing:1.8px;text-transform:uppercase}.topbar h1{font-size:23px;font-weight:700;margin:4px 0 0}.user-chip{display:flex;align-items:center;gap:10px;font-weight:600}.avatar{width:38px;height:38px;object-fit:cover;border-radius:50%;background:var(--lime);display:grid;place-items:center;color:#222;font-weight:700}
    .panel{background:var(--paper);border:1px solid var(--line);border-radius:12px;padding:22px}.panel-title{font-size:17px;font-weight:700;margin-bottom:5px}.muted{color:var(--muted)}.btn-lime{background:var(--lime);border:0;color:#22251f;font-weight:700}.btn-lime:hover{background:#c3ed5f;color:#222}.form-control,.form-select{background:var(--paper);color:var(--ink);border-color:var(--line);padding:11px}.form-control:focus,.form-select:focus{background:var(--paper);color:var(--ink);border-color:#a6cf4c;box-shadow:0 0 0 .2rem #d3ff7040}.table{--bs-table-bg:transparent;--bs-table-color:var(--ink)}.alert{border-radius:9px}.stat-card{background:var(--paper);border:1px solid var(--line);padding:20px;border-radius:12px;height:100%}.stat-card .number{font-size:30px;font-weight:700;letter-spacing:-1px}.hero{background:var(--ink);color:var(--cream);padding:34px;border-radius:14px;position:relative;overflow:hidden}.hero .lime{color:var(--lime)}.hero h2{font-size:clamp(30px,4vw,48px);font-weight:700;letter-spacing:-2px}.hero p{color:#b9c0b2;max-width:550px}.badge-soft{background:#d3ff7040;color:var(--ink);padding:6px 10px;border-radius:30px;font-size:11px;font-weight:700}.progress{height:8px;background:var(--line)}.progress-bar{background:#a8d94d}.list-row{padding:13px 0;border-bottom:1px solid var(--line)}.list-row:last-child{border:0}.mobile-toggle{display:none}
    @media(max-width:900px){.sidebar{width:72px;padding:24px 10px}.brand{font-size:0;padding:0 9px}.brand:before{content:'N';font-size:26px;color:var(--lime)}.brand small,.side-link span,.nav-caption,.side-bottom form span{display:none}.side-link{justify-content:center;padding:13px}.side-link i{font-size:19px}main{margin-left:72px;padding:22px 18px}}
    @media(max-width:560px){.topbar h1{font-size:18px}.user-chip .user-name{display:none}.hero{padding:25px}.panel{padding:17px}}
    @media print{.sidebar,.topbar,.no-print{display:none!important}main{margin:0;padding:0}.panel{border:0}}
    </style>
    @stack('head')
</head>
<body>
<aside class="sidebar">
    <a href="{{ route('dashboard') }}" class="brand text-decoration-none">MARI<span>.</span><small>STUDENT PORTAL</small></a>
    <div class="nav-caption">WORKSPACE</div>
    <a class="side-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2"></i><span>Dashboard</span></a>
    <a class="side-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}"><i class="bi bi-person"></i><span>My Profile</span></a>
    <a class="side-link {{ request()->routeIs('student-card') ? 'active' : '' }}" href="{{ route('student-card') }}"><i class="bi bi-person-vcard"></i><span>Digital Student ID</span></a>
    <a class="side-link {{ request()->routeIs('notifications.*') ? 'active' : '' }}" href="{{ route('notifications.index') }}"><i class="bi bi-bell"></i><span>Notifications @php($unreadSide = \App\Models\UserNotification::where('user_id', auth()->id())->whereNull('read_at')->count()) @if($unreadSide)<small class="badge text-bg-warning ms-auto">{{ $unreadSide }}</small>@endif</span></a>
    <a class="side-link {{ request()->routeIs('activities.*') ? 'active' : '' }}" href="{{ route('activities.index') }}"><i class="bi bi-clock-history"></i><span>Activity Timeline</span></a>
    <div class="nav-caption">PREFERENCES</div>
    <a class="side-link {{ request()->routeIs('security.*') ? 'active' : '' }}" href="{{ route('security.edit') }}"><i class="bi bi-shield-lock"></i><span>Security Center</span></a>
    <a class="side-link {{ request()->routeIs('settings.*') ? 'active' : '' }}" href="{{ route('settings.edit') }}"><i class="bi bi-sliders"></i><span>Settings</span></a>
    <div class="side-bottom"><form method="POST" action="{{ route('logout') }}">@csrf<button class="logout"><i class="bi bi-box-arrow-left me-2"></i><span>Logout</span></button></form></div>
</aside>
<main>
    <header class="topbar mb-4"><div><div class="eyebrow">MARI / @yield('section','Overview')</div><h1>@yield('heading','Dashboard')</h1></div><div class="user-chip">@if(auth()->user()->profile_photo_path)<img class="avatar" src="{{ asset('storage/'.auth()->user()->profile_photo_path) }}" alt="">@else<div class="avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>@endif<div class="user-name">{{ auth()->user()->name }}<div class="muted fw-normal" style="font-size:11px">{{ auth()->user()->nim }}</div></div></div></header>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger"><strong>Periksa kembali:</strong><ul class="mb-0 mt-1">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    @yield('content')
    <footer class="muted small mt-5 pt-3 border-top" style="border-color:var(--line)!important">© {{ date('Y') }} MARI Student Portal · Student Portal</footer>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body></html>
