<?php

namespace Database\Seeders;

use App\Models\Copy;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allGenres = Genre::all();
        $allPrices = Price::all();

        foreach ($allGenres as $genre) {

            foreach ($allPrices as $price) {

                Movie::factory(3)->create([
                    'genre_id' => $genre->id,
                    'price_id' => $price->id
                ])->each(function(Movie $movie){
                    $movie->save(Copy::factory()->create([
                        'movie_id' => $movie->id
                    ])->toArray());
                });
            }
        }
    }
}
