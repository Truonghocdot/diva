<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use App\Services\SiteContentService;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
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
        $settings = Setting::all()->mapWithKeys(fn (Setting $setting) => [$setting->key => $setting->resolved_value])->toArray();
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
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('site_tagline')
                            ->label('Tagline')
                            ->columnSpanFull(),
                        TextInput::make('site_title')
                            ->label('Tiêu đề SEO mặc định')
                            ->columnSpanFull(),
                        TextInput::make('logo_url')
                            ->label('URL Logo')
                            ->columnSpanFull(),
                        TextInput::make('header_cta_label')
                            ->label('Nhãn CTA header')
                            ->columnSpanFull(),
                        TextInput::make('header_cta_url')
                            ->label('Link CTA header')
                            ->columnSpanFull(),
                    ]),

                Section::make('Thông tin liên hệ')
                    ->columns(2)
                    ->schema([
                        TextInput::make('contact_email')
                            ->label('Email liên hệ')
                            ->email()
                            ->columnSpanFull(),
                        TextInput::make('contact_phone')
                            ->label('Số điện thoại')
                            ->columnSpanFull(),
                        TextInput::make('sales_phone')
                            ->label('Số hotline sales')
                            ->columnSpanFull(),
                        TextInput::make('address')
                            ->label('Địa chỉ')
                            ->columnSpanFull(),
                    ]),

                Section::make('Footer & thương hiệu')
                    ->columns(2)
                    ->schema([
                        Textarea::make('footer_about')
                            ->label('Mô tả footer')
                            ->rows(4)
                            ->columnSpanFull(),
                        TextInput::make('footer_company_heading')
                            ->label('Tên cột footer doanh nghiệp')
                            ->columnSpanFull(),
                        TextInput::make('footer_catalog_heading')
                            ->label('Tên cột footer catalog')
                            ->columnSpanFull(),
                        TextInput::make('footer_support_heading')
                            ->label('Tên cột footer hỗ trợ')
                            ->columnSpanFull(),
                        TextInput::make('footer_resources_heading')
                            ->label('Tên cột footer tài nguyên')
                            ->columnSpanFull(),
                        TextInput::make('footer_cta_label')
                            ->label('Nhãn CTA footer')
                            ->columnSpanFull(),
                        TextInput::make('footer_cta_url')
                            ->label('Link CTA footer')
                            ->columnSpanFull(),
                        TextInput::make('footer_bottom_text')
                            ->label('Dòng copyright / slogan')
                            ->columnSpanFull(),
                        TextInput::make('footer_contact_heading')
                            ->label('Tên cột liên hệ')
                            ->columnSpanFull(),
                    ]),

                Section::make('Mạng xã hội')
                    ->columns(2)
                    ->schema([
                        TextInput::make('facebook_url')
                            ->label('Facebook')
                            ->columnSpanFull(),
                        TextInput::make('instagram_url')
                            ->label('Instagram')
                            ->columnSpanFull(),
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn')
                            ->columnSpanFull(),
                        TextInput::make('zalo_url')
                            ->label('Zalo / chat link')
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            foreach ($data as $key => $value) {
                Setting::writeValue($key, $value);
            }

            app(SiteContentService::class)->clearCache();

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
