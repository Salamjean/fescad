<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communique extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
