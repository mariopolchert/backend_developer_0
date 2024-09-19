<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'price', 'late_fee'];

    public function movies(){
        return $this->hasMany(Movie::class);
    }
}
