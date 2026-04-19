<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make('Thông tin trang')
                            ->columnSpan(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Tiêu đề trang')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                    ->columnSpanFull(),
                                TextInput::make('slug')
                                    ->label('Đường dẫn')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->columnSpanFull(),
                                Textarea::make('summary')
                                    ->label('Mô tả ngắn')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),
                        Section::make('Xuất bản')
                            ->schema([
                                Select::make('template')
                                    ->label('Template')
                                    ->options([
                                        'default' => 'Mặc định',
                                    ])
                                    ->default('default')
                                    ->required()
                                    ->columnSpanFull(),
                                Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(false)
                                    ->helperText('Tat de giu trang o che do draft va xem bang preview an toan.')
                                    ->columnSpanFull(),
                                Toggle::make('is_homepage')
                                    ->label('Đặt làm trang chủ')
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Section::make('Page Builder')
                    ->description('Xây dựng landing page, trang giới thiệu, trang chính sách hoặc nội dung bán sỉ bằng các khối linh hoạt.')
                    ->schema([
                        Builder::make('content')
                            ->label('Khối nội dung')
                            ->blocks([
                                Block::make('hero')
                                    ->label('Hero')
                                    ->schema([
                                        TextInput::make('eyebrow')->label('Nhãn nhỏ')->columnSpanFull(),
                                        TextInput::make('title')->label('Tiêu đề')->required()->columnSpanFull(),
                                        Textarea::make('content')->label('Mô tả')->rows(4)->columnSpanFull(),
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('primary_button_label')->label('Nút chính')->columnSpanFull(),
                                                TextInput::make('primary_button_url')->label('Link nút chính')->columnSpanFull(),
                                                TextInput::make('secondary_button_label')->label('Nút phụ')->columnSpanFull(),
                                                TextInput::make('secondary_button_url')->label('Link nút phụ')->columnSpanFull(),
                                            ]),
                                        TextInput::make('image')->label('Ảnh nền / ảnh minh họa')->columnSpanFull(),
                                    ]),
                                Block::make('rich_text')
                                    ->label('Rich Text')
                                    ->schema([
                                        TextInput::make('heading')->label('Tiêu đề')->columnSpanFull(),
                                        RichEditor::make('content')
                                            ->label('Nội dung')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                                Block::make('stats')
                                    ->label('Chỉ số nổi bật')
                                    ->schema([
                                        TextInput::make('heading')->label('Tiêu đề')->columnSpanFull(),
                                        Repeater::make('items')
                                            ->label('Danh sách chỉ số')
                                            ->minItems(1)
                                            ->defaultItems(3)
                                            ->schema([
                                                TextInput::make('value')->label('Giá trị')->required()->columnSpanFull(),
                                                TextInput::make('label')->label('Nhãn')->required()->columnSpanFull(),
                                                Textarea::make('description')->label('Mô tả')->rows(2)->columnSpanFull(),
                                            ])
                                            ->columnSpanFull(),
                                    ]),
                                Block::make('feature_cards')
                                    ->label('Thẻ lợi thế')
                                    ->schema([
                                        TextInput::make('heading')->label('Tiêu đề')->columnSpanFull(),
                                        Textarea::make('intro')->label('Giới thiệu')->rows(3)->columnSpanFull(),
                                        Repeater::make('items')
                                            ->label('Thẻ nội dung')
                                            ->minItems(1)
                                            ->defaultItems(3)
                                            ->schema([
                                                TextInput::make('title')->label('Tiêu đề')->required()->columnSpanFull(),
                                                Textarea::make('content')->label('Mô tả')->rows(3)->columnSpanFull(),
                                            ])
                                            ->columnSpanFull(),
                                    ]),
                                Block::make('category_grid')
                                    ->label('Danh mục nguyên liệu')
                                    ->schema([
                                        TextInput::make('heading')->label('Tiêu đề')->required()->columnSpanFull(),
                                        Textarea::make('intro')->label('Mô tả')->rows(3)->columnSpanFull(),
                                    ]),
                                Block::make('product_showcase')
                                    ->label('Danh sách sản phẩm')
                                    ->schema([
                                        TextInput::make('heading')->label('Tiêu đề')->required()->columnSpanFull(),
                                        Textarea::make('intro')->label('Mô tả')->rows(3)->columnSpanFull(),
                                        Select::make('source')
                                            ->label('Nguồn dữ liệu')
                                            ->options([
                                                'featured' => 'Sản phẩm nổi bật',
                                                'latest' => 'Sản phẩm mới',
                                                'all' => 'Toàn bộ sản phẩm',
                                            ])
                                            ->default('featured')
                                            ->required()
                                            ->columnSpanFull(),
                                        TextInput::make('limit')
                                            ->label('Số lượng hiển thị')
                                            ->numeric()
                                            ->default(6)
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                                Block::make('call_to_action')
                                    ->label('Call To Action')
                                    ->schema([
                                        TextInput::make('heading')->label('Tiêu đề')->required()->columnSpanFull(),
                                        Textarea::make('content')->label('Mô tả')->rows(4)->columnSpanFull(),
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('button_label')->label('Nội dung nút')->columnSpanFull(),
                                                TextInput::make('button_url')->label('Link nút')->columnSpanFull(),
                                            ]),
                                    ]),
                            ])
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),

                Section::make('Cấu hình SEO')
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('SEO Title')
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->label('SEO Description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
