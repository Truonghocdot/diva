<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Tiêu đề')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('subtitle')
                    ->label('Phụ đề')
                    ->columnSpanFull(),
                Textarea::make('image')
                    ->label('Ảnh banner')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('link')
                    ->label('Liên kết')
                    ->columnSpanFull(),
                TextInput::make('button_text')
                    ->label('Nội dung nút')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Đang hiển thị')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Thứ tự hiển thị')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->columnSpanFull(),
            ]);
    }
}
