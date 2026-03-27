<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;

class DashboardService
{
    public function getKpiOverview(int $days = 30): array
    {
        $startDate = now()->subDays($days)->startOfDay();

        $ordersQuery = Order::query()
            ->where('created_at', '>=', $startDate)
            ->where('status', '!=', 'cancelled');

        $revenue = (float) $ordersQuery->sum('total_amount');
        $ordersCount = (int) $ordersQuery->count();
        $aov = $ordersCount > 0 ? $revenue / $ordersCount : 0;

        $newCustomers = (int) User::query()
            ->where('created_at', '>=', $startDate)
            ->count();

        $cartsCount = (int) Cart::query()
            ->where('created_at', '>=', $startDate)
            ->count();

        $conversionRate = $cartsCount > 0 ? ($ordersCount / $cartsCount) * 100 : 0;

        return [
            'revenue' => $revenue,
            'orders_count' => $ordersCount,
            'aov' => $aov,
            'new_customers' => $newCustomers,
            'conversion_rate' => $conversionRate,
        ];
    }

    public function getRevenueTrend(int $days = 30): array
    {
        $startDate = now()->subDays($days - 1)->startOfDay();

        $rows = Order::query()
            ->selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
            ->where('created_at', '>=', $startDate)
            ->where('status', '!=', 'cancelled')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $values = [];

        for ($i = 0; $i < $days; $i++) {
            $date = $startDate->copy()->addDays($i);
            $key = $date->toDateString();

            $labels[] = $date->format('d/m');
            $values[] = (float) ($rows[$key]->total ?? 0);
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    public function getTopProducts(int $days = 30, int $limit = 5): Collection
    {
        $startDate = now()->subDays($days)->startOfDay();

        return OrderItem::query()
            ->selectRaw('product_id, product_name, SUM(quantity) as sold_qty, SUM(total_price) as revenue')
            ->whereHas('order', fn ($query) => $query
                ->where('created_at', '>=', $startDate)
                ->where('status', '!=', 'cancelled'))
            ->groupBy('product_id', 'product_name')
            ->orderByDesc('revenue')
            ->limit($limit)
            ->get();
    }

    public function getLowStockProducts(int $threshold = 10, int $limit = 10): Collection
    {
        return Product::query()
            ->where('stock', '<=', $threshold)
            ->orderBy('stock')
            ->limit($limit)
            ->get(['id', 'name', 'stock', 'price']);
    }

    public function formatCurrency(float $amount): string
    {
        return number_format($amount, 0, ',', '.') . ' đ';
    }
}
