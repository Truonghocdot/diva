<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Tên danh mục')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Mô tả')
                    ->columnSpanFull(),
                Textarea::make('image')
                    ->label('Ảnh danh mục')
                    ->columnSpanFull(),
            ]);
    }
}
