<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->unique()->randomElement(['Action', 'Adventure', 'Animated', 'Comedy', 'Documentary', 'Drama', 'Fantasy', 'Historcal', 'Horror', 'Musical', 'Noir', 'Romance', 'Science Fiction', 'Thriller', 'Western']),
        ];
    }
}
