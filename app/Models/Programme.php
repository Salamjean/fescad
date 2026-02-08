<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_time',
        'title',
        'description',
        'location',
    ];

    protected $casts = [
        'date' => 'date',
        // 'start_time' => 'datetime:H:i', // Optional casting
    ];
}
