<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'image',
        'category',
        'order',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
