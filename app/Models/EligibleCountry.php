<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EligibleCountry extends Model
{
    protected $fillable = [
        'name',
        'iso_code',
        'description',
        'region',
        'display_color',
        'tooltip_text',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}