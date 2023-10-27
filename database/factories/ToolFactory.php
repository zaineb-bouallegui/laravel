<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $faker->word,
            'description' => $faker->paragraph,
            'prix' => $faker->randomFloat(2, 5, 100),
            'stock' => $faker->numberBetween(1, 100),
            'categorie' => $faker->word,
            'image' => $faker->imageUrl(),
        ];
    }
}
