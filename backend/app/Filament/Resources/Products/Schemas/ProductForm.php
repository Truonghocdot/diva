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
                            ->label('Tên nguyên liệu / SKU')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('sku')
                            ->label('Mã SKU'),
                        Select::make('category_id')
                            ->label('Danh mục')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        TextInput::make('price')
                            ->label('Giá sỉ tham chiếu')
                            ->required()
                            ->numeric()
                            ->prefix('đ'),
                        TextInput::make('unit')
                            ->label('Đơn vị tính')
                            ->placeholder('kg, lít, chai, bao, thùng'),
                        TextInput::make('min_order_quantity')
                            ->label('MOQ')
                            ->numeric()
                            ->default(1),
                        TextInput::make('pack_size')
                            ->label('Quy cách đóng gói'),
                        TextInput::make('lead_time_days')
                            ->label('Lead time (ngày)')
                            ->numeric(),
                        TextInput::make('origin')
                            ->label('Xuất xứ'),
                        TextInput::make('stock')
                            ->label('Tồn kho')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),

                Section::make('Mô tả & Hình ảnh')
                    ->schema([
                        Textarea::make('short_description')
                            ->label('Mô tả ngắn')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Mô tả chi tiết')
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

                Section::make('Thông số bán sỉ')
                    ->columns(3)
                    ->schema([
                        TagsInput::make('applications')
                            ->label('Ứng dụng')
                            ->placeholder('Nến thơm, mỹ phẩm, tẩy rửa...')
                            ->columnSpan(2),
                        Textarea::make('specifications')
                            ->label('Thông số / tiêu chuẩn kỹ thuật')
                            ->rows(5)
                            ->columnSpanFull(),
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
