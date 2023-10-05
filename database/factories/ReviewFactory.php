<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'title' => $this->faker->title(),
            'content' => $this->faker->paragraph, // Generate random paragraph for review content
            'rating' => $this->faker->numberBetween(1, 5), // Random rating between 1 and 5
        ];
    }
}
