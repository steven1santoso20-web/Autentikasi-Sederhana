@extends('layouts.nexus')
@section('title','Dashboard') @section('section','Overview') @section('heading','Dashboard')
@section('content')
<div class="hero mb-4"><div class="eyebrow text-white-50">YOUR STUDENT SPACE</div><h2 class="mt-3">Halo, <span class="lime">{{ explode(' ', trim($user->name))[0] }}.</span></h2><p>Selamat datang di MARI Student Portal. Kelola identitas, keamanan, dan aktivitas akademikmu dari satu tempat.</p><a href="{{ route('student-card') }}" class="btn btn-lime px-4 mt-2">Lihat Student ID <i class="bi bi-arrow-up-right ms-2"></i></a></div>
<div class="row g-3 mb-4">
 <div class="col-md-4"><div class="stat-card"><div class="muted">PROFILE COMPLETION</div><div class="number mt-2">{{ $profileCompletion }}%</div><div class="progress mt-3"><div class="progress-bar" style="width:{{ $profileCompletion }}%"></div></div><a href="{{ route('profile.edit') }}" class="small d-inline-block mt-3">Lengkapi profil <i class="bi bi-arrow-right"></i></a></div></div>
 <div class="col-md-4"><div class="stat-card"><div class="muted">NOTIFICATIONS</div><div class="number mt-2">{{ $notificationCount }}</div><div class="small muted mt-2">{{ $unreadCount }} belum dibaca</div><a href="{{ route('notifications.index') }}" class="small d-inline-block mt-3">Buka notifikasi <i class="bi bi-arrow-right"></i></a></div></div>
 <div class="col-md-4"><div class="stat-card"><div class="muted">STUDENT STATUS</div><div class="number mt-2 fs-3"><span class="badge text-bg-success">{{ $user->is_active ? 'ACTIVE' : 'INACTIVE' }}</span></div><div class="small muted mt-2">{{ $user->program_study }}</div><a href="{{ route('student-card') }}" class="small d-inline-block mt-3">Lihat kartu mahasiswa <i class="bi bi-arrow-right"></i></a></div></div>
</div>
<div class="row g-3"><div class="col-lg-7"><div class="panel h-100"><div class="d-flex justify-content-between align-items-center mb-3"><div><div class="panel-title">Recent Activity</div><div class="muted small">Aktivitas terbaru akunmu</div></div><a href="{{ route('activities.index') }}" class="small">Lihat semua</a></div>
@if($activities->isEmpty())<p class="muted py-3">Belum ada aktivitas. Aktivitas akun akan muncul di sini.</p>@else @foreach($activities as $activity)<div class="list-row d-flex justify-content-between gap-3"><div><strong>{{ $activity->action }}</strong><div class="muted small">{{ $activity->description }}</div></div><div class="muted small text-nowrap">{{ $activity->created_at->diffForHumans() }}</div></div>@endforeach @endif
</div></div><div class="col-lg-5"><div class="panel h-100"><div class="panel-title mb-1">Quick Access</div><div class="muted small mb-3">Akses cepat fitur utama</div>
<a class="list-row d-flex justify-content-between text-decoration-none" href="{{ route('profile.edit') }}"><span><i class="bi bi-person me-2"></i>Edit Profile</span><i class="bi bi-arrow-up-right"></i></a>
<a class="list-row d-flex justify-content-between text-decoration-none" href="{{ route('student-card') }}"><span><i class="bi bi-qr-code me-2"></i>Digital Student ID</span><i class="bi bi-arrow-up-right"></i></a>
<a class="list-row d-flex justify-content-between text-decoration-none" href="{{ route('security.edit') }}"><span><i class="bi bi-shield-lock me-2"></i>Security Center</span><i class="bi bi-arrow-up-right"></i></a>
<a class="list-row d-flex justify-content-between text-decoration-none" href="{{ route('settings.edit') }}"><span><i class="bi bi-sliders me-2"></i>Settings</span><i class="bi bi-arrow-up-right"></i></a>
</div></div></div>
@endsection
