<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PagePreviewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home']);
Route::get('/preview/pages/{page}', [PagePreviewController::class, 'show'])
    ->name('pages.preview')
    ->middleware('signed');
Route::get('/shop', [ProductController::class, 'index']);
Route::get('/products/{slug}', [ProductController::class, 'show']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{slug}', [PostController::class, 'show']);
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', '^(?!shop$|products$|checkout$|blog$|sitemap\.xml$|admin$|livewire.*|up$).+');
