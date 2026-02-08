<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', // 'ticket' or 'stand'
        'name',
        'email',
        'phone',
        'company',
        'quantity',
        'stand_type',
        'message',
        'status', // 'pending', 'accepted', 'rejected'
    ];
}
