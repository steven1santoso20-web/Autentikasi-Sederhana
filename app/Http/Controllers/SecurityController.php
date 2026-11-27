<?php

namespace App\Http\Controllers;

use App\Support\MARIActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SecurityController extends Controller
{
    public function edit()
    {
        return view('nexus.security');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        if (!Hash::check($request->current_password, $request->user()->password)) {
            throw ValidationException::withMessages(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        $request->user()->update(['password' => $request->password]);
        MARIActivity::log('Password diubah', 'Password akun berhasil diperbarui.');
        MARIActivity::notify('Keamanan akun', 'Password akun kamu baru saja diubah.', 'success');

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
