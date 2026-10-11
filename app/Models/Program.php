<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
        'start_time',
        'end_time',
        'location',
        'flyer_path',
        'registration_url',
        'status',
        'created_by',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}