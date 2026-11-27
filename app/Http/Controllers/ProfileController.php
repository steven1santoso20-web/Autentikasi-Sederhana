<?php

namespace App\Http\Controllers;

use App\Support\MARIActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('nexus.profile', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'nim' => ['required', 'string', 'max:20', Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_dash', 'max:50', Rule::unique('users')->ignore($user->id)],
            'birth_place' => ['required', 'string', 'max:100'],
            'birth_date' => ['required', 'date', 'before:today'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'program_study' => ['required', 'string', 'max:150'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('profile_photo')) {
            $newPhoto = $request->file('profile_photo')->store('profile-photos', 'public');
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $data['profile_photo_path'] = $newPhoto;
        }
        unset($data['profile_photo']);
        $user->update($data);

        MARIActivity::log('Profil diperbarui', 'Informasi profil mahasiswa diperbarui.');
        MARIActivity::notify('Profil diperbarui', 'Informasi profil kamu berhasil diperbarui.', 'success');

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
