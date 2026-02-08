<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'details',
        'status',
    ];

    protected $casts = [
        'details' => 'array',
    ];
}
