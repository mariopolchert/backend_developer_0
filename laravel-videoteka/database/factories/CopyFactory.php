<?php

namespace Database\Factories;

use App\Models\Format;
use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Copy>
 */
class CopyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movie_id = fake()->numberBetween(1, 50);
        $movie = Movie::find($movie_id);
        $format_id = fake()->numberBetween(1, 4);
        $format = Format::find($format_id);

        return [
            'barcode' => Str::slug($movie->title . '_' . $format->type . '_' . rand(1, 9)),
            'movie_id' => $movie_id,
            'format_id' => $format_id,
        ];
    }
}
