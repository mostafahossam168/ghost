<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a certain number of users using the factory
        // Assuming that your UserFactory handles the creation of fake data for phone and otp fields
        User::factory()->count(10)->create();
    }
}
