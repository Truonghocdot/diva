<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\PageResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\URL;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label('Xem trước')
                ->icon('heroicon-o-eye')
                ->url(fn (): string => URL::temporarySignedRoute('pages.preview', now()->addMinutes(30), [
                    'page' => $this->getRecord(),
                ]), shouldOpenInNewTab: true),
            DeleteAction::make(),
        ];
    }
}
