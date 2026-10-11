<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteCard extends Model
{
    protected $fillable = [
        'quote',
        'reference',
        'author',
        'background_type',
        'background_value',
        'text_color',
        'is_published',
        'created_by',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}