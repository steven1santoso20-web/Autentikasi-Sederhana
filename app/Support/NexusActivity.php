<?php

namespace App\Support;

use App\Models\ActivityLog;
use App\Models\UserNotification;
use Illuminate\Support\Facades\Auth;

class MARIActivity
{
    public static function log(string $action, string $description): void
    {
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => $action,
                'description' => $description,
                'ip_address' => request()->ip(),
            ]);
        }
    }

    public static function notify(string $title, string $message, string $type = 'info'): void
    {
        if (Auth::check()) {
            UserNotification::create([
                'user_id' => Auth::id(),
                'title' => $title,
                'message' => $message,
                'type' => $type,
            ]);
        }
    }
}
