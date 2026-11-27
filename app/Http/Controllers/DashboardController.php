<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\UserNotification;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user->student_id_token) {
            $user->forceFill(['student_id_token' => (string) \Illuminate\Support\Str::uuid()])->save();
        }

        return view('nexus.dashboard', [
            'user' => $user,
            'unreadCount' => UserNotification::where('user_id', $user->id)->whereNull('read_at')->count(),
            'notificationCount' => UserNotification::where('user_id', $user->id)->count(),
            'activities' => ActivityLog::where('user_id', $user->id)->latest()->take(5)->get(),
            'profileCompletion' => $this->profileCompletion($user),
        ]);
    }

    private function profileCompletion($user): int
    {
        $fields = ['nim', 'name', 'username', 'birth_place', 'birth_date', 'email', 'profile_photo_path', 'program_study'];
        $filled = collect($fields)->filter(fn ($field) => filled($user->{$field}))->count();
        return (int) round(($filled / count($fields)) * 100);
    }
}
