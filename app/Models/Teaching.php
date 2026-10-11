<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teaching extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'type',
        'description',
        'speaker',
        'teaching_date',
        'audio_path',
        'video_url',
        'thumbnail_path',
        'scripture_reference',
        'status',
        'published_at',
        'created_by',
    ];

    protected $casts = [
        'teaching_date' => 'date',
        'published_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeSermons($query)
    {
        return $query->where('type', 'sermon');
    }

    public function scopePalaceGuard($query)
    {
        return $query->where('type', 'palace_guard');
    }
}