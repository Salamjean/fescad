<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissaireMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'title',
        'message',
        'image',
        'signature_image',
    ];
}
