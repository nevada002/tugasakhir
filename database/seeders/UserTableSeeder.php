<?php

namespace Database\Seeders;

use App\Enum\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Agen',
            'email' => 'agen@mail.test',
            'password' => Hash::make('secret'),
            'role' => Role::AGEN,
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'CS',
            'email' => 'cs@mail.test',
            'password' => Hash::make('secret'),
            'role' => Role::CUSTOMER_SERVICE,
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Penanda Tangan',
            'email' => 'pt@mail.test',
            'password' => Hash::make('secret'),
            'role' => Role::SIGNER,
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Pihak Verifikasi',
            'email' => 'pv@mail.test',
            'password' => Hash::make('secret'),
            'role' => Role::VERIFICATOR,
            'email_verified_at' => now(),
        ]);
    }
}
