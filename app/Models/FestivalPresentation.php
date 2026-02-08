<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FestivalPresentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'hero_background',
        'video_link',
        'points',
        'btn1_text',
        'btn1_link',
        'btn2_text',
        'btn2_link',
    ];

    protected $casts = [
        'points' => 'array',
    ];
}
