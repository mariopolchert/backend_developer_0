<?php

namespace App\Services;

use App\Models\Movie;

class BarcodeService
{
    public function generate(Movie $movie, string $format)
    {
        $barcode = explode(' ', $movie->title);

        $barcode = mb_strtoupper(sprintf('%s%s-%s-%s',
            $barcode[0],
            count($barcode) > 1 ? end($barcode) : '',
            $movie->year,
            str_replace('-', '', $format)
        ));

        return $barcode;
    }
}