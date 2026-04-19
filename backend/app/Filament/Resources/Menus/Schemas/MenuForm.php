<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Thông tin menu')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Tên menu')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('location')
                            ->label('Vị trí hiển thị')
                            ->options([
                                'primary' => 'Header chính',
                                'footer_company' => 'Footer cột doanh nghiệp',
                                'footer_catalog' => 'Footer cột catalog',
                                'footer_support' => 'Footer cột hỗ trợ',
                                'footer_resources' => 'Footer cột tài nguyên',
                            ])
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Đang hoạt động')
                            ->default(true),
                    ]),

                Section::make('Cấu trúc menu')
                    ->description('Bạn có thể quản trị item cấp 1 và một tầng menu con cho mỗi item.')
                    ->schema([
                        Repeater::make('items')
                            ->label('Danh sách item')
                            ->defaultItems(1)
                            ->schema(self::menuItemSchema(3))
                            ->collapsed()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    protected static function menuItemSchema(int $remainingDepth): array
    {
        $schema = [
            TextInput::make('label')
                ->label('Nhãn')
                ->required(),
            TextInput::make('url')
                ->label('Đường dẫn / URL')
                ->required(),
            Toggle::make('open_in_new_tab')
                ->label('Mở tab mới'),
            Toggle::make('is_highlight')
                ->label('Nút nổi bật'),
        ];

        if ($remainingDepth > 1) {
            $schema[] = Repeater::make('children')
                ->label('Menu con')
                ->schema(self::menuItemSchema($remainingDepth - 1))
                ->columnSpanFull()
                ->collapsed();
        }

        return $schema;
    }
}
