<?php

namespace App\Models;

use App\Services\SiteContentService;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'location',
        'items',
        'is_active',
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(fn () => app(SiteContentService::class)->clearCache());
        static::deleted(fn () => app(SiteContentService::class)->clearCache());
    }
}
