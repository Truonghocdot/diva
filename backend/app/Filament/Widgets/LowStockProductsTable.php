<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LowStockProductsTable extends TableWidget
{
    protected static ?string $heading = 'Cảnh báo tồn kho thấp';
    protected int|string|array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()->where('stock', '<=', 10)->orderBy('stock')
            )
            ->defaultPaginationPageOption(5)
            ->columns([
                TextColumn::make('name')->label('Sản phẩm')->searchable(),
                TextColumn::make('stock')->label('Tồn kho')->badge(),
                TextColumn::make('price')->label('Giá')->money('VND')->sortable(),
                TextColumn::make('updated_at')->label('Cập nhật')->dateTime(),
            ]);
    }
}
