<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalVision extends Model
{
    use HasFactory;

    protected $fillable = [
        'vision_title',
        'vision_text',
        'vision_image',
        'mission_title',
        'mission_text',
        'mission_points',
        'mission_image',
    ];

    protected $casts = [
        'mission_points' => 'array',
    ];
}
