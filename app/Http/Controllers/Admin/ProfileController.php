<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required_if:role,' . Role::CUSTOMER_SERVICE->value, 'string'],
            'jabatan' => ['required_if:role,' . Role::SIGNER->value, 'required_if:role,' . Role::VERIFICATOR->value, 'string'],
            'old_password' => ['nullable', 'required_with_all:new_password,new_password_confirmation', 'string'],
            'new_password' => ['nullable', 'required_with_all:old_password', 'string', 'min:8', 'confirmed'],
        ]);

        if (
            $request->old_password && 
            !Hash::check($request->old_password, auth()->user()->password)
        ) {
            return redirect()->back()->withErrors('Kata sandi lama tidak sesuai.');
        }
        
        $data = $request->except(['old_password', 'new_password', 'new_password_confirmation']);
        if ($request->new_password) {
            $data['password'] = Hash::make($request->new_password);
        }

        User::find(auth()->id())->update($data);

        return redirect()->back()->with(['success' => 'Berhasil memperbarui profil.']);
    }
}
