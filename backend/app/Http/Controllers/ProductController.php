<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $categorySlug = $request->query('category');
        
        if ($categorySlug) {
            $products = $this->productService->getProductsByCategory($categorySlug);
        } else {
            $products = $this->productService->getAllProducts();
        }

        $categories = $this->productService->getAllCategories();

        return view('products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = $this->productService->getProductBySlug($slug);
        $relatedProducts = $this->productService->getRelatedProducts($product, 4);
        
        return view('products.show', compact('product', 'relatedProducts'));
    }
}
