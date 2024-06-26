<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            ServiceSeeder::class,
            BookingSeeder::class,
            UsersSeeder::class,
            ScooterSeeder::class,
            SupportFaqsSeeder::class,
        ]);
    }
}