<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Joki',
            'email' => 'admin@joki.com',
            'password' => Hash::make('password'),
            'role' => 'admin', // pastikan kolom 'role' ada di tabel users
        ]);
    }
}
