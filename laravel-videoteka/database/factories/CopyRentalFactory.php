<?php

namespace Database\Factories;

use App\Models\Copy;
use App\Models\Copy_rental;
use App\Models\Rental;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Copy_rental>
 */
class CopyRentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rentalId = fake()->numberBetween(1, 20);
        $date = Rental::find($rentalId)->rental_date;
        if ($date !== null) {
            $date = fake()->dateTimeBetween('$date', '-2 week');
        } elseif (Copy_rental::where('rental_id', $rentalId) !== null) {
            $date = fake()->dateTimeBetween('-2 week', '-1 week');
        }

        $copyId = fake()->unique()->numberBetween(1, 200);
        Copy::where('id', $copyId)->update(['available' => 0]);

        return [
            'rental_id' => $rentalId,
            'copy_id' => $copyId,
            'return_date' => $date,
        ];
    }
}
