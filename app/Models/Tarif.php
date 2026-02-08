<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'icon',
        'features',
        'recommended',
    ];

    protected $casts = [
        'features' => 'array',
        'recommended' => 'boolean',
    ];
}
