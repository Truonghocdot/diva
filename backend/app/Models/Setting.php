<?php

namespace App\Models;

use App\Services\SiteContentService;
use Illuminate\Database\Eloquent\Model;
use JsonException;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    public function getResolvedValueAttribute(): mixed
    {
        if ($this->value === null) {
            return null;
        }

        try {
            return json_decode($this->value, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return $this->value;
        }
    }

    public static function writeValue(string $key, mixed $value, string $group = 'general'): void
    {
        static::updateOrCreate(
            ['key' => $key],
            [
                'value' => is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value,
                'group' => $group,
            ],
        );
    }

    protected static function booted(): void
    {
        static::saved(fn () => app(SiteContentService::class)->clearCache());
        static::deleted(fn () => app(SiteContentService::class)->clearCache());
    }
}
