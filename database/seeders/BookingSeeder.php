<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Let's assume you want to create 5 bookings for each service
        $services = Service::all();
        
        $services->each(function ($service) {
            $users = User::inRandomOrder()->take(5)->get(); // Get 5 random users

            $users->each(function ($user) use ($service) {
                Booking::create([
                    'service_id' => $service->id,
                    'user_id' => $user->id,
                    'scheduled_date' => now()->addDays(rand(1, 30)), // Random date in the future
                ]);
            });
        });
    }
}
