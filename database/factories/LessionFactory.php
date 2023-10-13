<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'type' => fake()->word,
            'content' => fake()->sentence,
            'position' => fake()->numberBetween($min = 1, $max = 10),
            'is_free' => fake()->numberBetween($min = 1, $max = 3),
            'section_id' => fake()->numberBetween($min = 1, $max = 10),
            'duration' => fake()->numberBetween($min = 60, $max = 100),
            'image_url' => fake()->imageUrl(640,480),   
        ];
    }
}
