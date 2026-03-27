<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentOrdersTable extends TableWidget
{
    protected static ?string $heading = 'Đơn hàng gần đây';
    protected int|string|array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()->latest('placed_at')
            )
            ->defaultPaginationPageOption(5)
            ->columns([
                TextColumn::make('order_number')->label('Mã đơn')->searchable(),
                TextColumn::make('customer_name')->label('Khách hàng')->searchable(),
                TextColumn::make('total_amount')->label('Tổng tiền')->money('VND')->sortable(),
                TextColumn::make('status')->badge(),
                TextColumn::make('placed_at')->label('Thời gian')->dateTime()->sortable(),
            ]);
    }
}
