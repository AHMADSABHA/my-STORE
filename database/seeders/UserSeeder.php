<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'عميل افتراضي',
            'email' => 'customer@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
