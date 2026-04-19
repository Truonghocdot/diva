<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_name')
                    ->label('Tên khách hàng')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('location')
                    ->label('Khu vực')
                    ->columnSpanFull(),
                Textarea::make('content')
                    ->label('Nội dung đánh giá')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('rating')
                    ->label('Số sao')
                    ->required()
                    ->numeric()
                    ->default(5)
                    ->columnSpanFull(),
            ]);
    }
}
