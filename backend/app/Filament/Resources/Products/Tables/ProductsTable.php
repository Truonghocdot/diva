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
                TextColumn::make('category_id')
                    ->label('Danh mục')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Giá bán')
                    ->money()
                    ->sortable(),
                TextColumn::make('sale_price')
                    ->label('Giá khuyến mãi')
                    ->money()
                    ->sortable(),
                TextColumn::make('stock')
                    ->label('Tồn kho')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('wax_type')
                    ->label('Loại sáp')
                    ->searchable(),
                TextColumn::make('burn_time')
                    ->label('Thời gian cháy')
                    ->searchable(),
                TextColumn::make('weight')
                    ->label('Khối lượng')
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
