<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')->label('Mã đơn')->searchable(),
                TextColumn::make('customer_name')->label('Khách hàng')->searchable(),
                TextColumn::make('customer_email')->label('Email')->searchable(),
                TextColumn::make('total_amount')->label('Tổng tiền')->money('VND')->sortable(),
                TextColumn::make('status')
                    ->label('Trạng thái đơn')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'completed' => 'Hoàn thành',
                        'cancelled' => 'Đã hủy',
                        default => $state,
                    }),
                TextColumn::make('payment_status')
                    ->label('Thanh toán')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Chờ thanh toán',
                        'paid' => 'Đã thanh toán',
                        'failed' => 'Thanh toán lỗi',
                        default => $state,
                    }),
                TextColumn::make('placed_at')->label('Thời gian đặt')->dateTime()->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
