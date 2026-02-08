<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'youtube_link',
    ];

    public function getEmbedUrlAttribute()
    {
        $url = $this->youtube_link;
        $url = str_replace('watch?v=', 'embed/', $url);
        return $url;
    }
}
