<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
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
                            ->label('Tên sản phẩm')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('category_id')
                            ->label('Danh mục')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        TextInput::make('price')
                            ->label('Giá bán')
                            ->required()
                            ->numeric()
                            ->prefix('đ'),
                        TextInput::make('sale_price')
                            ->label('Giá khuyến mãi')
                            ->numeric()
                            ->prefix('đ'),
                        TextInput::make('stock')
                            ->label('Tồn kho')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),

                Section::make('Mô tả & Hình ảnh')
                    ->schema([
                        Textarea::make('description')
                            ->label('Mô tả sản phẩm')
                            ->rows(5)
                            ->columnSpanFull(),
                        TextInput::make('image')
                            ->label('URL ảnh đại diện')
                            ->columnSpanFull(),
                        TagsInput::make('images')
                            ->label('Danh sách URL ảnh gallery')
                            ->placeholder('Nhập URL và nhấn Enter')
                            ->columnSpanFull(),
                    ]),

                Section::make('Thông số kỹ thuật')
                    ->columns(3)
                    ->schema([
                        TextInput::make('wax_type')->label('Loại sáp'),
                        TextInput::make('burn_time')->label('Thời gian cháy'),
                        TextInput::make('weight')->label('Khối lượng'),
                    ]),

                Section::make('Hồ sơ mùi hương')
                    ->columns(3)
                    ->schema([
                        TagsInput::make('scent_top_notes')
                            ->label('Nốt hương đầu')
                            ->placeholder('Nhập và nhấn Enter'),
                        TagsInput::make('scent_middle_notes')
                            ->label('Nốt hương giữa')
                            ->placeholder('Nhập và nhấn Enter'),
                        TagsInput::make('scent_base_notes')
                            ->label('Nốt hương cuối')
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
