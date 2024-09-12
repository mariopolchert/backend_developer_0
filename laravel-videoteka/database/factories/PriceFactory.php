<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['Hit', 'Ne-hit', 'Stari']),//TODO: improve this
            'price' => fake()->randomFloat(2, 0, 100),
            'late_fee' => fake()->randomFloat(2, 0, 100)
        ];
    }
}
