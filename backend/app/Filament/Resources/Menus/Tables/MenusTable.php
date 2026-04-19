<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên menu')
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Vị trí')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'primary' => 'Header chính',
                        'footer_company' => 'Footer doanh nghiệp',
                        'footer_catalog' => 'Footer catalog',
                        'footer_support' => 'Footer hỗ trợ',
                        'footer_resources' => 'Footer tài nguyên',
                        default => $state,
                    }),
                IconColumn::make('is_active')
                    ->label('Hoạt động')
                    ->boolean(),
                TextColumn::make('updated_at')
                    ->label('Cập nhật')
                    ->dateTime()
                    ->sortable(),
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
