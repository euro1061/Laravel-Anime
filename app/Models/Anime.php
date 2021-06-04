<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = [
        'Active',
        'AnimeName',
        'EpisodeAvailable',
        'Overview',
        'CoverImage',
        'PosterImage'
    ];
    use HasFactory;
}
