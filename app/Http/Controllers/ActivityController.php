<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = ActivityLog::where('user_id', auth()->id())->latest()->paginate(15);
        return view('nexus.activities', compact('activities'));
    }
}
