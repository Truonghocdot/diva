<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $staticUrls = [
            [
                'loc' => url('/'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'loc' => url('/shop'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '0.9',
            ],
        ];

        $categoryUrls = Category::query()
            ->select(['slug', 'updated_at'])
            ->get()
            ->map(function (Category $category) {
                return [
                    'loc' => url('/shop?category=' . $category->slug),
                    'lastmod' => optional($category->updated_at)->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            });

        $productUrls = Product::query()
            ->select(['slug', 'updated_at'])
            ->get()
            ->map(function (Product $product) {
                return [
                    'loc' => url('/products/' . $product->slug),
                    'lastmod' => optional($product->updated_at)->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            });

        $pageUrls = Page::query()
            ->where('is_published', true)
            ->where('is_homepage', false)
            ->select(['slug', 'updated_at'])
            ->get()
            ->map(function (Page $page) {
                return [
                    'loc' => url('/' . $page->slug),
                    'lastmod' => optional($page->updated_at)->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.7',
                ];
            });

        $urls = collect($staticUrls)
            ->concat($categoryUrls)
            ->concat($productUrls)
            ->concat($pageUrls);

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }
}
