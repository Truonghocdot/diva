<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Support\WebpImageUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make('Nội dung chính')
                            ->columnSpan(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Tiêu đề bài viết')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                    ->columnSpanFull(),
                                TextInput::make('slug')
                                    ->label('Đường dẫn (Slug)')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->columnSpanFull(),
                                RichEditor::make('content')
                                    ->label('Nội dung')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('excerpt')
                                    ->label('Mô tả ngắn (Excerpt)')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),

                        Grid::make(1)
                            ->columnSpan(1)
                            ->schema([
                                Section::make('Phân loại & Trạng thái')
                                    ->schema([
                                        Select::make('category_id')
                                            ->label('Danh mục')
                                            ->relationship('category', 'name')
                                            ->required()
                                            ->searchable()
                                            ->preload()
                                            ->columnSpanFull(),
                                        Select::make('status')
                                            ->label('Trạng thái')
                                            ->options([
                                                'draft' => 'Bản nháp',
                                                'published' => 'Xuất bản',
                                            ])
                                            ->required()
                                            ->default('draft')
                                            ->columnSpanFull(),
                                        DateTimePicker::make('published_at')
                                            ->label('Ngày xuất bản')
                                            ->columnSpanFull(),
                                        Select::make('author_id')
                                            ->label('Tác giả')
                                            ->relationship('author', 'name')
                                            ->default(fn () => auth()->id())
                                            ->required()
                                            ->searchable()
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Hình ảnh đại diện')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('Ảnh bìa')
                                            ->image()
                                            ->acceptedFileTypes([
                                                'image/jpeg',
                                                'image/png',
                                                'image/webp',
                                                'image/gif',
                                            ])
                                            ->directory('posts')
                                            ->disk('public')
                                            ->visibility('public')
                                            ->saveUploadedFileUsing(fn ($component, $file): string => WebpImageUpload::store($file, $component))
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ]),

                Section::make('Cấu hình SEO')
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('SEO Title')
                            ->placeholder('Mặc định lấy từ tiêu đề bài viết')
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->label('SEO Description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
