<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->company,
            'description' => $this->faker->paragraph(),
            'rating' => $this->faker->numberBetween($min = 200, $max = 9000),
        ];
    }
}
