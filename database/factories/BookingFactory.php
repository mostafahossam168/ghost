<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'service_id' => Service::factory(),
            'user_id' => User::factory(),
            'scheduled_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            // Add other fields here as necessary
        ];
    }
}
