<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'points',
        'btn_text',
        'btn_link',
        'order',
        'is_reversed',
    ];

    protected $casts = [
        'points' => 'array',
        'is_reversed' => 'boolean',
    ];

    public function getPointsAttribute($value)
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return is_array($decoded) ? $decoded : [$value];
        }
        return $value ?: [];
    }
}
