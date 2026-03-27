<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * Get all categories.
     *
     * @return Collection
     */
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    /**
     * Get featured products.
     *
     * @param int $limit
     * @return Collection
     */
    public function getFeaturedProducts(int $limit = 4): Collection
    {
        return Product::where('is_featured', true)
            ->with('category')
            ->take($limit)
            ->get();
    }

    /**
     * Get new arrivals.
     *
     * @param int $limit
     * @return Collection
     */
    public function getNewArrivals(int $limit = 4): Collection
    {
        return Product::where('is_new', true)
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }

    /**
     * Get products by category slug.
     *
     * @param string $slug
     * @return Collection
     */
    public function getProductsByCategory(string $slug): Collection
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return $category->products()->with('category')->get();
    }

    /**
     * Get all products with optional filtering.
     *
     * @return Collection
     */
    public function getAllProducts(): Collection
    {
        return Product::with('category')->get();
    }

    /**
     * Get a single product by its slug.
     *
     * @param string $slug
     * @return Product
     */
    public function getProductBySlug(string $slug): Product
    {
        return Product::where('slug', $slug)->with('category')->firstOrFail();
    }

    /**
     * Get related products (same category).
     *
     * @param Product $product
     * @param int $limit
     * @return Collection
     */
    public function getRelatedProducts(Product $product, int $limit = 4): Collection
    {
        return Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('category')
            ->take($limit)
            ->get();
    }
}
