<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SiteContentService
{
    public function getSettings(): array
    {
        return Cache::remember('site.settings', now()->addMinutes(30), function (): array {
            return Setting::query()
                ->get()
                ->mapWithKeys(fn (Setting $setting) => [$setting->key => $setting->resolved_value])
                ->toArray();
        });
    }

    public function getMenus(): array
    {
        return Cache::remember('site.menus', now()->addMinutes(30), function (): array {
            return Menu::query()
                ->where('is_active', true)
                ->get()
                ->mapWithKeys(fn (Menu $menu) => [$menu->location => $menu])
                ->toArray();
        });
    }

    public function clearCache(): void
    {
        Cache::forget('site.settings');
        Cache::forget('site.menus');
    }
}
