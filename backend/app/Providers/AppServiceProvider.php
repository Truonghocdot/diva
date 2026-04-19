<?php

namespace App\Providers;

use App\Services\SiteContentService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SiteContentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view): void {
            $siteContent = app(SiteContentService::class);

            $view->with('siteSettings', $siteContent->getSettings());
            $view->with('siteMenus', $siteContent->getMenus());
        });
    }
}
