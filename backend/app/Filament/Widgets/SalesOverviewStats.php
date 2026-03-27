<?php

namespace App\Filament\Widgets;

use App\Services\DashboardService;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SalesOverviewStats extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        $dashboard = app(DashboardService::class);
        $kpi = $dashboard->getKpiOverview(30);

        return [
            Stat::make('Doanh thu (30 ngày)', $dashboard->formatCurrency($kpi['revenue']))
                ->description('Tổng doanh thu chưa hủy')
                ->color('success'),
            Stat::make('Đơn hàng (30 ngày)', number_format($kpi['orders_count']))
                ->description('Số đơn phát sinh')
                ->color('primary'),
            Stat::make('AOV', $dashboard->formatCurrency($kpi['aov']))
                ->description('Giá trị đơn trung bình')
                ->color('info'),
            Stat::make('Tỉ lệ chuyển đổi giỏ', number_format($kpi['conversion_rate'], 2) . '%')
                ->description('Orders / Carts')
                ->color('warning'),
            Stat::make('Khách hàng mới (30 ngày)', number_format($kpi['new_customers']))
                ->description('Tài khoản mới tạo')
                ->color('gray'),
        ];
    }
}
