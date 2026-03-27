<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Testimonial;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $featuredProducts = $this->productService->getFeaturedProducts(4);
        $testimonials = Testimonial::orderBy('created_at', 'desc')->take(3)->get();
        $categories = $this->productService->getAllCategories();
        $banners = Banner::where('is_active', true)->orderBy('sort_order')->get();

        return view('home', compact('featuredProducts', 'testimonials', 'categories', 'banners'));
    }
}
