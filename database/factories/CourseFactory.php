<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
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
            'description' => fake()->sentence,
            'slug' => fake()->sentence,
            'category_id' => fake()->numberBetween($min = 1, $max = 10),
            'price_old' => fake()->numberBetween($min = 100, $max = 1000),
            'price' => fake()->numberBetween($min = 100, $max = 1000),
            'level_id' => fake()->numberBetween($min = 1, $max = 3),
            'image_url' => fake()->imageUrl(640,480),
            'formality' => fake()->sentence,
            'selled' => '0'
        ];
    }
}
