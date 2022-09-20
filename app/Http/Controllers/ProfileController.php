<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required_if:role,1', 'string'],
            'old_password' => ['nullable', 'required_with_all:new_password,new_password_confirmation', 'string'],
            'new_password' => ['nullable', 'required_with_all:old_password', 'string', 'min:8', 'confirmed'],
        ]);

        if (
            $request->old_password && 
            !Hash::check($request->old_password, auth()->user()->password)
        ) {
            return redirect()->back()->withErrors('Kata sandi lama tidak sesuai.');
        }

        $data = $request->only(['name', 'alamat']);
        if ($request->new_password) {
            $data['password'] = Hash::make($request->new_password);
        }

        User::find(auth()->id())->update($data);

        return redirect()->back()->with(['success' => 'Berhasil memperbarui profil.']);
    }
}
