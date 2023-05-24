<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BodyStatus>
 */
class BodyStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'weight' => fake()->randomFloat(1, 40, 110),
            'height' => fake()->randomFloat(1, 53, 250),
            'neck' => fake()->randomFloat(1, 30, 80),
            'waist' => fake()->randomFloat(1, 50, 200),
            'hip' => fake()->randomFloat(1, 50, 200)
        ];
    }
}
