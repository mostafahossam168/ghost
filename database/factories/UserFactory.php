<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Hash::make('password') is recommended in actual application
            'phone' => $this->faker->phoneNumber,
            'otp' => '0000', // Static OTP for the sake of this example
            'remember_token' => Str::random(10),
        ];
    }
}
