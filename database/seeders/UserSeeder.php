<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);
        User::create([
            'name' => 'bos',
            'username' => 'bos',
            'email' => 'bos@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('456'),
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);
    }
}
