<?php

namespace Database\Seeders;

use App\Models\Copy_rental;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CopyRentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Copy_rental::factory(25)->create();

    }
}
