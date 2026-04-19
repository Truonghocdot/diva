<?php

namespace App\Filament\Resources\Pages\RelationManagers;

use App\Models\PageRevision;
use Filament\Actions\Action;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PageRevisionsRelationManager extends RelationManager
{
    protected static string $relationship = 'revisions';

    protected static ?string $title = 'Lịch sử revision';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Thời điểm')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Người sửa')
                    ->default('Hệ thống')
                    ->searchable(),
                IconColumn::make('is_published')
                    ->label('Đã xuất bản')
                    ->boolean(),
                IconColumn::make('is_homepage')
                    ->label('Trang chủ')
                    ->boolean(),
                TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->limit(40),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                Action::make('restore')
                    ->label('Khôi phục')
                    ->requiresConfirmation()
                    ->action(function (PageRevision $record): void {
                        $page = $this->getOwnerRecord();
                        $page->restoreRevision($record);
                    }),
            ])
            ->toolbarActions([]);
    }
}
