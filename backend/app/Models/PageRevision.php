<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageRevision extends Model
{
    protected $fillable = [
        'page_id',
        'user_id',
        'title',
        'slug',
        'summary',
        'content',
        'template',
        'is_published',
        'is_homepage',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'content' => 'array',
        'is_published' => 'boolean',
        'is_homepage' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
