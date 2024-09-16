<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title' => fake()->unique()->randomElement(['The Shawshank Redemption', 'The Godfather', 'The Dark Knight', 'The Godfather Part II', '12 Angry Men',
                                                    'Schindler\'s List', 'The Lord of the Rings: The Return of the King', 'Pulp Fiction', 'The Lord of the Rings: The Fellowship of the Ring',
                                                    'The Good, the Bad and the Ugly', 'Forrest Gump', 'The Lord of the Rings: The Two Towers', 'Fight Club', 'Inception',
                                                    'Star Wars: Episode V - The Empire Strikes Back', 'The Matrix', 'Goodfellas', 'One Flew Over the Cuckoo\'s Nest', 'Interstellar',
                                                    'Se7en', 'It\'s a Wonderful Life', 'Seven Samurai', 'The Silence of the Lambs', 'Saving Private Ryan',
                                                    'City of God', 'Life Is Beautiful', 'The Green Mile', 'Terminator 2: Judgment Day', 'Star Wars: Episode IV - A New Hope',
                                                    'Back to the Future', 'Spirited Away', 'The Pianist', 'Parasite', 'Psycho',
                                                    'Gladiator', 'The Lion King', 'Spider-Man: Across the Spider-Verse', 'The Departed', 'Whiplash',
                                                    'American History X', 'Léon: The Professional', 'Grave of the Fireflies', 'The Prestige', 'Harakiri',
                                                    'Dune: Part Two', 'The Usual Suspects', 'Casablanca', 'The Intouchables', 'Cinema Paradiso', 'Modern Times']),
        'year' => fake()->numberBetween(1930, 2024),
        'genre_id' => fake()->numberBetween(1, 15),
        'price_id' => fake()->numberBetween(1, 4),
        ];
    }
}