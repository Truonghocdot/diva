<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Thông tin đơn hàng')
                ->columns(2)
                ->schema([
                    TextInput::make('order_number')->label('Mã đơn')->disabled()->dehydrated(false)->columnSpanFull(),
                    TextInput::make('company_name')->label('Tên doanh nghiệp')->columnSpanFull(),
                    TextInput::make('customer_name')->label('Tên khách hàng')->required()->columnSpanFull(),
                    TextInput::make('contact_position')->label('Chức vụ liên hệ')->columnSpanFull(),
                    TextInput::make('customer_email')->label('Email khách hàng')->email()->required()->columnSpanFull(),
                    TextInput::make('customer_phone')->label('Số điện thoại')->required()->columnSpanFull(),
                    TextInput::make('tax_code')->label('Mã số thuế')->columnSpanFull(),
                    Select::make('status')
                        ->label('Trạng thái đơn')
                        ->options([
                            'pending' => 'Chờ xử lý',
                            'processing' => 'Đang xử lý',
                            'completed' => 'Hoàn thành',
                            'cancelled' => 'Đã hủy',
                        ])
                        ->required()
                        ->columnSpanFull(),
                    Select::make('payment_status')
                        ->label('Trạng thái thanh toán')
                        ->options([
                            'pending' => 'Chờ thanh toán',
                            'paid' => 'Đã thanh toán',
                            'failed' => 'Thanh toán lỗi',
                        ])
                        ->required()
                        ->columnSpanFull(),
                    TextInput::make('total_amount')->label('Tổng tiền')->numeric()->prefix('đ')->required()->columnSpanFull(),
                    TextInput::make('shipping_fee')->label('Phí vận chuyển')->numeric()->prefix('đ')->required()->columnSpanFull(),
                    Textarea::make('notes')->label('Ghi chú')->columnSpanFull(),
                ]),
        ]);
    }
}
