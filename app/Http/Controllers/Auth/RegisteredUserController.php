<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nim' => ['required', 'string', 'max:20', 'unique:users,nim'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:50', 'alpha_dash', 'unique:users,username'],
            'birth_place' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date', 'before:today'],
            'email' => ['nullable', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo_path'] = $request
                ->file('profile_photo')
                ->store('profile-photos', 'public');
        }

        $user = User::create([
            'nim' => $validated['nim'],
            'name' => $validated['name'],
            'username' => $validated['username'],
            'birth_place' => $validated['birth_place'],
            'birth_date' => $validated['birth_date'],
            'email' => $validated['email'] ?? null,
            'password' => $validated['password'],
            'profile_photo_path' => $validated['profile_photo_path'] ?? null,
            'program_study' => 'Teknik Mekatronika',
            'student_id_token' => (string) Str::uuid(),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
