<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GivingInformation extends Model
{
    protected $table = 'giving_information';

    protected $fillable = [
        'title',
        'description',
        'method',
        'bank_name',
        'account_name',
        'account_number',
        'payment_url',
        'instructions',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}