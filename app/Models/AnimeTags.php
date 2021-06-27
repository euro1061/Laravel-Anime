<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeTags extends Model
{
    protected $fillable = [
        'TagId','AnimeId'
    ];

    public function Tag(){
        return $this->hasOne(Tag::class, 'id', 'TagId');
    }

    public function Anime(){
        return $this->hasOne(Anime::class, 'id', 'AnimeId');
    }

    public function AnimePost()
    {
        return $this->belongsTo(Anime::class, 'id', 'AnimeId');
    }
    use HasFactory;
}
