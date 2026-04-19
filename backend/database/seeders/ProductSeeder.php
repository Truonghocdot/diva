<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $soyWax = Category::updateOrCreate(
            ['slug' => 'soy-wax'],
            [
                'name' => 'Sáp nến soy',
                'description' => 'Các dòng sáp nến thông dụng cho sản xuất nến hũ, tealight và votive.',
                'image' => 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?q=80&w=1200&auto=format&fit=crop',
            ]
        );

        $fragranceOils = Category::updateOrCreate(
            ['slug' => 'fragrance-oils'],
            [
                'name' => 'Hương liệu',
                'description' => 'Hương liệu cho nến, xịt phòng, diffuser và sản phẩm home fragrance.',
                'image' => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?q=80&w=1200&auto=format&fit=crop',
            ]
        );

        $wickAndTools = Category::updateOrCreate(
            ['slug' => 'wick-and-tools'],
            [
                'name' => 'Bấc và dụng cụ',
                'description' => 'Bấc, đế gắn bấc và dụng cụ thao tác cho xưởng sản xuất.',
                'image' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f?q=80&w=1200&auto=format&fit=crop',
            ]
        );

        $packaging = Category::updateOrCreate(
            ['slug' => 'packaging'],
            [
                'name' => 'Bao bì',
                'description' => 'Hũ thủy tinh, nắp, hộp và phụ kiện đóng gói cho thành phẩm hoàn chỉnh.',
                'image' => 'https://images.unsplash.com/photo-1607082350899-7e105aa886ae?q=80&w=1200&auto=format&fit=crop',
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'soy-wax-cw-464'],
            [
                'category_id' => $soyWax->id,
                'name' => 'Soy Wax CW-464',
                'sku' => 'WAX-CW464',
                'description' => 'Dòng sáp soy thông dụng cho nến hũ với bề mặt mịn, độ bám mùi ổn định và khả năng thao tác dễ dàng trong xưởng sản xuất.',
                'short_description' => 'Sáp soy CW-464 cho nến hũ, dễ thao tác và bám mùi ổn định.',
                'price' => 89000,
                'unit' => 'kg',
                'min_order_quantity' => 20,
                'pack_size' => 'Bao 22.68 kg',
                'lead_time_days' => 3,
                'origin' => 'USA',
                'stock' => 320,
                'image' => 'https://images.unsplash.com/photo-1616628182509-6f74f2fcb58f?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nến hũ', 'Nến votive', 'Nến workshop'],
                'specifications' => "Màu: ngà\nNhiệt độ rót tham khảo: 70-75°C\nTỷ lệ bám mùi đề xuất: 6-10%",
                'is_featured' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'coconut-apricot-wax-blend'],
            [
                'category_id' => $soyWax->id,
                'name' => 'Coconut Apricot Wax Blend',
                'sku' => 'WAX-CA900',
                'description' => 'Dòng sáp cao cấp cho nến container, ưu tiên bề mặt đẹp và cảm quan mềm, phù hợp cho các bộ sưu tập premium.',
                'short_description' => 'Wax blend cao cấp cho dòng nến container premium.',
                'price' => 128000,
                'unit' => 'kg',
                'min_order_quantity' => 18,
                'pack_size' => 'Thùng 18 kg',
                'lead_time_days' => 5,
                'origin' => 'Malaysia',
                'stock' => 180,
                'image' => 'https://images.unsplash.com/photo-1616628188469-1c5e5f96365e?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nến hũ premium', 'Nến spa', 'Gift set'],
                'specifications' => "Màu: trắng kem\nBề mặt: mềm, mịn\nTỷ lệ bám mùi đề xuất: 8-12%",
                'is_featured' => true,
                'is_new' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'lavender-cedar-fragrance-oil'],
            [
                'category_id' => $fragranceOils->id,
                'name' => 'Lavender Cedar Fragrance Oil',
                'sku' => 'FO-LC220',
                'description' => 'Hương liệu phong cách thư giãn với lavender, cedarwood và musk nhẹ. Phù hợp cho nến, reed diffuser và xịt phòng.',
                'short_description' => 'Hương liệu cho nến, xịt phòng và diffuser.',
                'price' => 165000,
                'unit' => 'chai',
                'min_order_quantity' => 12,
                'pack_size' => 'Chai 500 ml',
                'lead_time_days' => 7,
                'origin' => 'Singapore',
                'stock' => 96,
                'image' => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nến thơm', 'Room spray', 'Reed diffuser'],
                'specifications' => "Dung tích: 500 ml\nFlash point: >93°C\nIFRA: có cập nhật",
                'is_featured' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'cotton-wick-cd-12'],
            [
                'category_id' => $wickAndTools->id,
                'name' => 'Cotton Wick CD-12',
                'sku' => 'WICK-CD12',
                'description' => 'Bấc cotton pre-tabbed cho nến hũ, phù hợp nhiều dòng sáp soy và wax blend phổ biến.',
                'short_description' => 'Bấc cotton pre-tabbed cho nến hũ và workshop.',
                'price' => 2800,
                'unit' => 'sợi',
                'min_order_quantity' => 500,
                'pack_size' => 'Túi 1.000 sợi',
                'lead_time_days' => 2,
                'origin' => 'China',
                'stock' => 5000,
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nến hũ 6-7 cm', 'Workshop DIY'],
                'specifications' => "Kiểu bấc: cotton pre-tabbed\nChiều dài: 15 cm\nĐóng gói: 1.000 sợi / túi",
                'is_featured' => true,
                'is_new' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'amber-glass-jar-250ml'],
            [
                'category_id' => $packaging->id,
                'name' => 'Amber Glass Jar 250ml',
                'sku' => 'PKG-JAR250',
                'description' => 'Hũ thủy tinh màu hổ phách dung tích 250 ml, phù hợp dòng nến spa và gift set trung cấp.',
                'short_description' => 'Hũ thủy tinh 250 ml cho dòng nến hũ premium.',
                'price' => 14500,
                'unit' => 'hũ',
                'min_order_quantity' => 96,
                'pack_size' => 'Thùng 96 hũ',
                'lead_time_days' => 4,
                'origin' => 'Vietnam',
                'stock' => 960,
                'image' => 'https://images.unsplash.com/photo-1612196808214-b7e239e5bd18?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nến hũ', 'Gift set', 'Spa line'],
                'specifications' => "Dung tích: 250 ml\nChất liệu: thủy tinh amber\nĐóng gói: thùng 96 hũ",
                'is_featured' => true,
                'is_new' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Lê Thu - Candle Lab', 'content' => 'Chúng tôi cần một nguồn cung nguyên liệu ổn định và Diva Materials đã giúp đội mua hàng rút ngắn thời gian lập đơn đáng kể.'],
            ['location' => 'Hà Nội', 'rating' => 5]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Minh Quân - OEM Studio', 'content' => 'Giá tham chiếu, MOQ và quy cách hiển thị rõ ngay trên storefront nên đội vận hành của chúng tôi kiểm tra dữ liệu rất nhanh.'],
            ['location' => 'TP. Hồ Chí Minh', 'rating' => 5]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Bảo Ngọc - Workshop Supply', 'content' => 'Tinh thần B2B rõ hơn trước rất nhiều, đặc biệt là luồng đặt mua sỉ và phần page builder có thể tự chỉnh trong admin.'],
            ['location' => 'Đà Nẵng', 'rating' => 4]
        );

        Banner::updateOrCreate(
            ['title' => 'Diva Materials'],
            [
                'subtitle' => 'Nguyên liệu và giải pháp B2B',
                'image' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?q=80&w=2070&auto=format&fit=crop',
                'link' => '/shop',
                'button_text' => 'Xem catalog',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );
    }
}
