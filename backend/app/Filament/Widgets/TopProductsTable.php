<?php

namespace App\Filament\Widgets;

use App\Models\OrderItem;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class TopProductsTable extends TableWidget
{
    protected static ?string $heading = 'Top sản phẩm (30 ngày)';
    protected int|string|array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                OrderItem::query()
                    ->selectRaw('MIN(id) as id, product_id, product_name, SUM(quantity) as sold_qty, SUM(total_price) as revenue')
                    ->whereHas('order', fn($query) => $query
                        ->where('created_at', '>=', now()->subDays(30)->startOfDay())
                        ->where('status', '!=', 'cancelled'))
                    ->groupBy('product_id', 'product_name')
                    ->orderByDesc('revenue')
            )
            ->defaultKeySort(false)
            ->defaultPaginationPageOption(5)
            ->columns([
                TextColumn::make('product_name')->label('Sản phẩm')->searchable(),
                TextColumn::make('sold_qty')->label('Đã bán')->numeric(),
                TextColumn::make('revenue')->label('Doanh thu')->money('VND'),
            ]);
    }
}
