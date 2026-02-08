<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalHistorique extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'description',
        'image',
    ];
}
