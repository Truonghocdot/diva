<?php

namespace App\Filament\Widgets;

use App\Services\DashboardService;
use Filament\Widgets\LineChartWidget;

class RevenueTrendChart extends LineChartWidget
{
    protected ?string $heading = 'Xu hướng doanh thu';

    protected ?string $pollingInterval = '120s';

    public ?string $filter = '30';

    protected function getFilters(): ?array
    {
        return [
            '7' => '7 ngày',
            '30' => '30 ngày',
            '90' => '90 ngày',
        ];
    }

    protected function getData(): array
    {
        $days = (int) ($this->filter ?: 30);
        $trend = app(DashboardService::class)->getRevenueTrend($days);

        return [
            'datasets' => [
                [
                    'label' => 'Doanh thu',
                    'data' => $trend['values'],
                    'fill' => true,
                ],
            ],
            'labels' => $trend['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
