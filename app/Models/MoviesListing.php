<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviesListing extends Model
{
    use HasFactory;
     protected $fillable = [
        'MovieName',
        'ActorName',
        'image',
        'ReleaseDate'
    ];
    
}
