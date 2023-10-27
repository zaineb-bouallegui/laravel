<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        \App\Models\Tool::factory(10)->create([
            'image' => $faker->imageUrl(), // Add this line to generate random image URLs
        ]);
    }
}
