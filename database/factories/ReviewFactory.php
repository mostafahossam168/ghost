<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50), // Assuming you have users between 1 to 50
            'service_id' => $this->faker->numberBetween(1, 20), // Assuming services range from 1 to 20
            'rating' => $this->faker->numberBetween(1, 5), // Ratings from 1 to 5
            'comment' => $this->faker->sentence,
        ];
    }
}
