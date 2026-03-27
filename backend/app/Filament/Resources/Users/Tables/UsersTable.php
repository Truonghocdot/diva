<?php

namespace App\Filament\Resources\Users\Tables;

use App\Constants\UserRole;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('name')->label('Họ tên')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('role')
                    ->label('Vai trò')
                    ->formatStateUsing(fn ($state) => UserRole::label((int) $state))
                    ->badge(),
                TextColumn::make('created_at')->label('Ngày tạo')->dateTime()->sortable(),
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
