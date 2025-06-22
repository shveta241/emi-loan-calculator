<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'developer',
            'password' => Hash::make('Test@Password123#'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}