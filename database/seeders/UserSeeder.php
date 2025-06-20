<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Dimas Tampan',
            'email' => 'dimas@gmail.com',
            'password' => Hash::make('uluketel'), 
            'role' => 'admin',
        ]);

        // Anggota 1
        User::create([
            'name' => 'Anggota Satu',
            'email' => 'anggota1@gmail.com',
            'password' => Hash::make('uluketel'),
            'role' => 'anggota',
        ]);

        // Anggota 2
        User::create([
            'name' => 'Anggota Dua',
            'email' => 'anggota2@gmail.com',
            'password' => Hash::make('uluketel'),
            'role' => 'anggota',
        ]);
    }
}
