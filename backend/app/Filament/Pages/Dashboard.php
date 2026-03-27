<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\LowStockProductsTable;
use App\Filament\Widgets\RecentOrdersTable;
use App\Filament\Widgets\RevenueTrendChart;
use App\Filament\Widgets\SalesOverviewStats;
use App\Filament\Widgets\TopProductsTable;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';

    /**
     * @return array<class-string<Widget> | WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        return [
            SalesOverviewStats::class,
            RevenueTrendChart::class,
            RecentOrdersTable::class,
            TopProductsTable::class,
            LowStockProductsTable::class,
        ];
    }

    /**
     * @return int | array<string, ?int>
     */
    public function getColumns(): int | array
    {
        return [
            'md' => 2,
            'xl' => 3,
        ];
    }
}
