<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->truncate(); // Untuk hapus data lama lalu insert data baru
        DB::table('admins')->insert([
            [
            'username' => 'admin',
            'password' => Hash::make('dijsam2024'), // hash password
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'username' => 'admin2',
            'password' => Hash::make('admin1234'),
            'created_at' => now(),
            'updated_at' => now(),
    ],
            [
            'username' => 'admin3',
            'password' => Hash::make('abcdefg1'),
            'created_at' => now(),
            'updated_at' => now(),
    ],
        ],
    );
    }
}

