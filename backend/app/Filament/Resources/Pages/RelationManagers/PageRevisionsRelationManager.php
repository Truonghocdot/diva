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

    protected static ?string $title = 'Lich su revision';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Thoi diem')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Nguoi sua')
                    ->default('System')
                    ->searchable(),
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                IconColumn::make('is_homepage')
                    ->label('Trang chu')
                    ->boolean(),
                TextColumn::make('title')
                    ->label('Tieu de')
                    ->limit(40),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                Action::make('restore')
                    ->label('Khoi phuc')
                    ->requiresConfirmation()
                    ->action(function (PageRevision $record): void {
                        $page = $this->getOwnerRecord();
                        $page->restoreRevision($record);
                    }),
            ])
            ->toolbarActions([]);
    }
}
