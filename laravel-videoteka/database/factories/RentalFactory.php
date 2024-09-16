<?php

namespace Database\Factories;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = count(Rental::all()) % 2 == 0 ? null : fake()->dateTimeBetween('-1 week', 'now');

        return [
            'rental_date' => fake()->dateTimeBetween('-1 month', '-2 week'),
            'user_id' => fake()->numberBetween(1, 10),
            'return_date' => $date,
        ];
    }
}
