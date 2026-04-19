<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->label('Danh mục')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Giá sỉ')
                    ->money()
                    ->sortable(),
                TextColumn::make('unit')
                    ->label('Đơn vị')
                    ->searchable(),
                TextColumn::make('min_order_quantity')
                    ->label('MOQ')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('stock')
                    ->label('Tồn kho')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('origin')
                    ->label('Xuất xứ')
                    ->searchable(),
                IconColumn::make('is_featured')
                    ->label('Nổi bật')
                    ->boolean(),
                IconColumn::make('is_new')
                    ->label('Mới')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
