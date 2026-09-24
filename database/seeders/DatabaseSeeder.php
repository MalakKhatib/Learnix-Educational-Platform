<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@learnix.com',
            'password' => '12345678',
            'role' => 'admin',
            'phone' => null,
            'address' => null,
            'university_id' => null,
            'profile_image' => null,
        ]);
    }
}
