<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_id',
        'order_number',
        'company_name',
        'customer_name',
        'contact_position',
        'customer_email',
        'customer_phone',
        'tax_code',
        'shipping_address_line1',
        'shipping_address_line2',
        'shipping_city',
        'shipping_province',
        'shipping_postal_code',
        'shipping_country',
        'subtotal',
        'shipping_fee',
        'discount_amount',
        'total_amount',
        'payment_method',
        'payment_status',
        'status',
        'placed_at',
        'notes',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping_fee' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'placed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
