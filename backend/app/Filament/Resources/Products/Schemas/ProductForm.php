<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Thông tin cơ bản')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('đ'),
                        TextInput::make('sale_price')
                            ->numeric()
                            ->prefix('đ'),
                        TextInput::make('stock')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),

                Section::make('Mô tả & Hình ảnh')
                    ->schema([
                        Textarea::make('description')
                            ->rows(5)
                            ->columnSpanFull(),
                        TextInput::make('image')
                            ->label('URL Hình ảnh')
                            ->columnSpanFull(),
                    ]),

                Section::make('Thông số kỹ thuật')
                    ->columns(3)
                    ->schema([
                        TextInput::make('wax_type'),
                        TextInput::make('burn_time'),
                        TextInput::make('weight'),
                    ]),

                Section::make('Hồ sơ mùi hương')
                    ->columns(3)
                    ->schema([
                        TagsInput::make('scent_top_notes')
                            ->placeholder('Nhập và nhấn Enter'),
                        TagsInput::make('scent_middle_notes')
                            ->placeholder('Nhập và nhấn Enter'),
                        TagsInput::make('scent_base_notes')
                            ->placeholder('Nhập và nhấn Enter'),
                    ]),

                Section::make('Trạng thái')
                    ->columns(2)
                    ->schema([
                        Toggle::make('is_featured')
                            ->label('Nổi bật'),
                        Toggle::make('is_new')
                            ->label('Mới'),
                    ]),
            ]);
    }
}
