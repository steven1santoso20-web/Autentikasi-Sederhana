<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\MARIActivity;
use Illuminate\Support\Str;

class StudentCardController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        if (!$user->student_id_token) {
            $user->forceFill(['student_id_token' => (string) Str::uuid()])->save();
        }
        MARIActivity::log('Kartu mahasiswa dibuka', 'Kartu mahasiswa digital ditampilkan.');
        return view('nexus.student-card', compact('user'));
    }

    public function verify(string $token)
    {
        $user = User::where('student_id_token', $token)->first();
        return view('nexus.verify', [
            'user' => $user,
            'valid' => $user !== null && $user->is_active,
        ]);
    }
}
