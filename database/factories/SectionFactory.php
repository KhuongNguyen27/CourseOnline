<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SectionFactory extends Factory
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
            'is_free' => fake()->numberBetween($min = 1, $max = 3),
            'course_id' => fake()->numberBetween($min = 1, $max = 10),
            'position' => fake()->numberBetween($min = 1, $max = 10),
        ];
    }
}
