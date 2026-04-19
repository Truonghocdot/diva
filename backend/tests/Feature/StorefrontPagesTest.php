<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Page;
use App\Services\CartService;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use InvalidArgumentException;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class StorefrontPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_wholesale_storefront_routes_are_accessible(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/')->assertOk()->assertSee('Diva Materials')->assertSee('Nguyên liệu')->assertSee('Quản trị nội dung');
        $this->get('/about')->assertOk()->assertSee('Về chúng tôi');
        $this->get('/shop')->assertOk()->assertSee('Catalog mua sỉ');
        $this->get('/checkout')->assertOk()->assertSee('Đặt mua sỉ');
    }

    public function test_cart_service_rejects_quantities_below_moq(): void
    {
        $this->seed(DatabaseSeeder::class);

        $product = Product::query()->where('min_order_quantity', '>', 1)->firstOrFail();

        $this->expectException(InvalidArgumentException::class);

        app(CartService::class)->addProduct($product, 1);
    }

    public function test_draft_page_can_be_previewed_via_signed_url(): void
    {
        $page = Page::create([
            'title' => 'Draft Preview Page',
            'slug' => 'draft-preview-page',
            'summary' => 'Preview only',
            'content' => [],
            'template' => 'default',
            'is_published' => false,
            'is_homepage' => false,
        ]);

        $previewUrl = URL::temporarySignedRoute('pages.preview', now()->addMinutes(5), [
            'page' => $page,
        ]);

        $this->get($previewUrl)
            ->assertOk()
            ->assertSee('Bạn đang xem bản preview của trang nháp');
    }

    public function test_page_saves_revision_history(): void
    {
        $page = Page::create([
            'title' => 'Revision Page',
            'slug' => 'revision-page',
            'summary' => 'First version',
            'content' => [],
            'template' => 'default',
            'is_published' => false,
            'is_homepage' => false,
        ]);

        $page->update([
            'summary' => 'Second version',
        ]);

        $this->assertGreaterThanOrEqual(2, $page->revisions()->count());
    }
}
