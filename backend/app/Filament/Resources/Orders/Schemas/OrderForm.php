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
                    TextInput::make('order_number')->label('Mã đơn')->disabled()->dehydrated(false),
                    TextInput::make('company_name')->label('Tên doanh nghiệp'),
                    TextInput::make('customer_name')->label('Tên khách hàng')->required(),
                    TextInput::make('contact_position')->label('Chức vụ liên hệ'),
                    TextInput::make('customer_email')->label('Email khách hàng')->email()->required(),
                    TextInput::make('customer_phone')->label('Số điện thoại')->required(),
                    TextInput::make('tax_code')->label('Mã số thuế'),
                    Select::make('status')
                        ->label('Trạng thái đơn')
                        ->options([
                            'pending' => 'Chờ xử lý',
                            'processing' => 'Đang xử lý',
                            'completed' => 'Hoàn thành',
                            'cancelled' => 'Đã hủy',
                        ])
                        ->required(),
                    Select::make('payment_status')
                        ->label('Trạng thái thanh toán')
                        ->options([
                            'pending' => 'Chờ thanh toán',
                            'paid' => 'Đã thanh toán',
                            'failed' => 'Thanh toán lỗi',
                        ])
                        ->required(),
                    TextInput::make('total_amount')->label('Tổng tiền')->numeric()->prefix('đ')->required(),
                    TextInput::make('shipping_fee')->label('Phí vận chuyển')->numeric()->prefix('đ')->required(),
                    Textarea::make('notes')->label('Ghi chú')->columnSpanFull(),
                ]),
        ]);
    }
}
