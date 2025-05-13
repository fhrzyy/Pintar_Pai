<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Guru',
            'email' => 'lasminingsih02@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);
        
        // Create User
        User::create([
            'name' => 'Siswa',
            'email' => 'rozi12@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user'
        ]);
    }
}