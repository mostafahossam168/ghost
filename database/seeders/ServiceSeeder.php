<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        // You can create a specific number of services using the factory
        Service::factory()->count(10)->create();
    }
}
