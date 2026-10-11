<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrayerRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'request',
        'is_private',
        'status',
    ];

    protected $casts = [
        'is_private' => 'boolean',
    ];
}