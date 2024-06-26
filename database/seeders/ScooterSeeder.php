<?php

namespace Database\Seeders;

use App\Models\Scooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scooter::create(
            [
                'imei' => '11111',
                'user_id' => 1
            ]
        );
    }
}