<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Rafael Carlos Campanero',
            'email' => 'rafaelc.campanero@gmail.com',
            'email_verified_at' => null,
            'password' => '$2y$12$z6f./d/iue9RYFjGKeYSOOygwv8n9pnHOpbcFKQ1XkmdM083q946i',
            'current_team_id' => null,
            'profile_photo_path' => null,
            'remember_token' => null,
            'created_at' => '2025-03-16 18:49:11',
            'updated_at' => '2025-03-16 18:49:11',
        ]);
    }
}
