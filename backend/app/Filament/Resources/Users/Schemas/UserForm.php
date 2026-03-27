<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Constants\UserRole;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Thông tin người dùng')
                ->columns(2)
                ->schema([
                    TextInput::make('name')->label('Họ tên')->required()->maxLength(255),
                    TextInput::make('email')->label('Email')->required()->email()->unique(ignoreRecord: true),
                    TextInput::make('password')
                        ->label('Mật khẩu')
                        ->password()
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn (string $operation) => $operation === 'create')
                        ->minLength(8),
                    Select::make('role')
                        ->label('Vai trò')
                        ->required()
                        ->options(UserRole::labels())
                        ->default(UserRole::CLIENT),
                ]),
        ]);
    }
}
