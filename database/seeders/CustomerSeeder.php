<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'name' => 'أحمد علي',
            'email' => 'ahmad2@example.com',
            'password' => Hash::make('password123'),
            'phone' => '0790000000',
            'address' => 'عمان - الأردن',
            'job' => 'مبرمج ويب',
            'image' => 'testimonials/ahmad.jpg',
        ]);
    }
}
