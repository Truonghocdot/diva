<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'price', 'sale_price',
        'stock', 'image', 'images', 'wax_type', 'burn_time', 'weight',
        'scent_top_notes', 'scent_middle_notes', 'scent_base_notes',
        'is_featured', 'is_new'
    ];

    protected $casts = [
        'images' => 'array',
        'scent_top_notes' => 'array',
        'scent_middle_notes' => 'array',
        'scent_base_notes' => 'array',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_new' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getGalleryImagesAttribute(): array
    {
        $images = is_array($this->images) ? $this->images : [];

        if ($this->image) {
            array_unshift($images, $this->image);
        }

        $images = array_values(array_filter($images, fn ($url) => is_string($url) && trim($url) !== ''));

        return array_values(array_unique($images));
    }
}
