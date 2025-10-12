<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Enkripsi password
            'role' => 'admin', // Pastikan kolom 'role' ada di tabel users
            // Atau gunakan kolom 'is_admin' dengan nilai true :cite[5]
            // 'is_admin' => true,
        ]);
    }
}
