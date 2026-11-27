<?php

namespace App\Http\Controllers;

use App\Support\MARIActivity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('nexus.settings', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'theme' => ['required', Rule::in(['light', 'dark'])],
            'profile_visibility' => ['required', Rule::in(['private', 'public'])],
        ]);
        $request->user()->update($data);
        MARIActivity::log('Pengaturan diperbarui', 'Preferensi tampilan atau privasi diperbarui.');
        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
