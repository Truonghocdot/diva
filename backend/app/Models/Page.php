<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
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

    public function revisions(): HasMany
    {
        return $this->hasMany(PageRevision::class)->latest();
    }

    public function snapshotData(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'content' => $this->content,
            'template' => $this->template,
            'is_published' => $this->is_published,
            'is_homepage' => $this->is_homepage,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }

    public function createRevision(?int $userId = null): void
    {
        $payload = $this->snapshotData();
        $latestRevision = $this->revisions()->latest('id')->first();

        if ($latestRevision && collect($payload)->every(fn ($value, $key) => $latestRevision->{$key} == $value)) {
            return;
        }

        $this->revisions()->create([
            ...$payload,
            'user_id' => $userId ?? auth()->id(),
        ]);
    }

    public function restoreRevision(PageRevision $revision): void
    {
        $this->fill($revision->only([
            'title',
            'slug',
            'summary',
            'content',
            'template',
            'is_published',
            'is_homepage',
            'meta_title',
            'meta_description',
        ]));

        $this->save();
    }

    protected static function booted(): void
    {
        static::saved(function (Page $page): void {
            if ($page->wasRecentlyCreated || $page->wasChanged()) {
                $page->createRevision();
            }
        });
    }
}
