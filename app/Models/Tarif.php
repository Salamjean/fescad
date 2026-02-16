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

    public function getFeaturesAttribute($value)
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return is_array($decoded) ? $decoded : [$value];
        }
        return $value ?: [];
    }
}
