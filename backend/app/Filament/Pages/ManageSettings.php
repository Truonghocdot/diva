<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;

class ManageSettings extends Page implements HasSchemas
{


    protected static ?string $navigationLabel = 'Cấu hình hệ thống';
    protected static ?string $title = 'Cấu hình hệ thống';

    protected string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Thông tin chung')
                    ->columns(2)
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Tên website')
                            ->required(),
                        TextInput::make('site_title')
                            ->label('Tiêu đề SEO'),
                        TextInput::make('logo_url')
                            ->label('URL Logo'),
                    ]),

                Section::make('Thông tin liên hệ')
                    ->columns(2)
                    ->schema([
                        TextInput::make('contact_email')
                            ->label('Email liên hệ')
                            ->email(),
                        TextInput::make('contact_phone')
                            ->label('Số điện thoại'),
                        TextInput::make('address')
                            ->label('Địa chỉ')
                            ->columnSpanFull(),
                    ]),

                Section::make('Mạng xã hội')
                    ->columns(2)
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('Facebook'),
                        TextInput::make('instagram_url')
                            ->label('Instagram'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            foreach ($data as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }

            Notification::make()
                ->title('Lưu cấu hình thành công')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Có lỗi xảy ra')
                ->danger()
                ->send();
        }
    }
}
