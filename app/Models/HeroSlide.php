<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'btn1_text',
        'btn1_link',
        'btn2_text',
        'btn2_link',
        'order',
        'is_active',
    ];
}
