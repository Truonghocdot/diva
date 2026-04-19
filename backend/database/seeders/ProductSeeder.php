<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Banner;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $soyWax = Category::updateOrCreate(
            ['slug' => 'soy-wax'],
            [
                'name' => 'Soy Wax',
                'description' => 'Cac dong sap nen thong dung cho san xuat nen hu, tealight va votive.',
                'image' => 'https://images.unsplash.com/photo-1615485290382-441e4d049cb5?q=80&w=1200&auto=format&fit=crop'
            ]
        );

        $fragranceOils = Category::updateOrCreate(
            ['slug' => 'fragrance-oils'],
            [
                'name' => 'Fragrance Oils',
                'description' => 'Huong lieu nen, xit phong va san pham home fragrance.',
                'image' => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?q=80&w=1200&auto=format&fit=crop'
            ]
        );

        $wickAndTools = Category::updateOrCreate(
            ['slug' => 'wick-and-tools'],
            [
                'name' => 'Wick And Tools',
                'description' => 'Bac, de gan bac va dung cu thao tac cho xuong san xuat.',
                'image' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f?q=80&w=1200&auto=format&fit=crop'
            ]
        );

        $packaging = Category::updateOrCreate(
            ['slug' => 'packaging'],
            [
                'name' => 'Packaging',
                'description' => 'Hu thuy tinh, nap, hop va phu kien dong goi cho san pham hoan chinh.',
                'image' => 'https://images.unsplash.com/photo-1607082350899-7e105aa886ae?q=80&w=1200&auto=format&fit=crop'
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'soy-wax-cw-464'],
            [
                'category_id' => $soyWax->id,
                'name' => 'Soy Wax CW-464',
                'sku' => 'WAX-CW464',
                'description' => 'Dong sap soy thong dung cho nen hu voi be mat min, do bam mui on dinh va kha nang thao tac de dang trong xuong san xuat.',
                'short_description' => 'Sap soy CW-464 cho nen hu, de thao tac, bam mui on dinh.',
                'price' => 89000,
                'unit' => 'kg',
                'min_order_quantity' => 20,
                'pack_size' => 'Bao 22.68 kg',
                'lead_time_days' => 3,
                'origin' => 'USA',
                'stock' => 320,
                'image' => 'https://images.unsplash.com/photo-1616628182509-6f74f2fcb58f?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nen hu', 'Nen votive', 'Nen workshop'],
                'specifications' => "Mau: nga\nNhiet do rot tham khao: 70-75C\nTy le bam mui de xuat: 6-10%",
                'is_featured' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'coconut-apricot-wax-blend'],
            [
                'category_id' => $soyWax->id,
                'name' => 'Coconut Apricot Wax Blend',
                'sku' => 'WAX-CA900',
                'description' => 'Dong sap cao cap cho nen container, uu tien be mat dep va cam quan mem, phu hop cho dong san pham premium.',
                'short_description' => 'Wax blend cao cap cho dong nen container premium.',
                'price' => 128000,
                'unit' => 'kg',
                'min_order_quantity' => 18,
                'pack_size' => 'Thung 18 kg',
                'lead_time_days' => 5,
                'origin' => 'Malaysia',
                'stock' => 180,
                'image' => 'https://images.unsplash.com/photo-1616628188469-1c5e5f96365e?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nen hu premium', 'Nen spa', 'Gift set'],
                'specifications' => "Mau: trang kem\nBe mat: mem, min\nTy le bam mui de xuat: 8-12%",
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
                'description' => 'Huong lieu phong cach thu gian voi lavender, cedarwood va musk nhe. Phu hop cho nen, reed diffuser va xit phong.',
                'short_description' => 'Huong lieu cho nen, xit phong va diffuser.',
                'price' => 165000,
                'unit' => 'chai',
                'min_order_quantity' => 12,
                'pack_size' => 'Chai 500 ml',
                'lead_time_days' => 7,
                'origin' => 'Singapore',
                'stock' => 96,
                'image' => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nen thom', 'Room spray', 'Reed diffuser'],
                'specifications' => "Dung tich: 500 ml\nFlash point: >93C\nIFRA: co cap nhat",
                'is_featured' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'cotton-wick-cd-12'],
            [
                'category_id' => $wickAndTools->id,
                'name' => 'Cotton Wick CD-12',
                'sku' => 'WICK-CD12',
                'description' => 'Bac cotton pre-tabbed cho nen hu, phu hop nhieu dong sap soy va wax blend pho bien.',
                'short_description' => 'Bac cotton pre-tabbed cho nen hu va workshop.',
                'price' => 2800,
                'unit' => 'soi',
                'min_order_quantity' => 500,
                'pack_size' => 'Tui 1,000 soi',
                'lead_time_days' => 2,
                'origin' => 'China',
                'stock' => 5000,
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nen hu 6-7 cm', 'Workshop DIY'],
                'specifications' => "Kieu bac: cotton pre-tabbed\nChieu dai: 15 cm\nDong goi: 1,000 soi / tui",
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
                'description' => 'Hu thuy tinh mau ho phach dung tich 250 ml, phu hop dong nen spa va dong gift set trung cap.',
                'short_description' => 'Hu thuy tinh 250 ml cho dong nen hu premium.',
                'price' => 14500,
                'unit' => 'hu',
                'min_order_quantity' => 96,
                'pack_size' => 'Thung 96 hu',
                'lead_time_days' => 4,
                'origin' => 'Vietnam',
                'stock' => 960,
                'image' => 'https://images.unsplash.com/photo-1612196808214-b7e239e5bd18?q=80&w=1200&auto=format&fit=crop',
                'applications' => ['Nen hu', 'Gift set', 'Spa line'],
                'specifications' => "Dung tich: 250 ml\nChat lieu: thuy tinh amber\nDong goi: thung 96 hu",
                'is_featured' => true,
                'is_new' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Le Thu - Candle Lab', 'content' => 'Chung toi can mot nguon cung nguyen lieu on dinh va Diva Materials da giup doi mua hang rut ngan thoi gian lap don dang ke.'],
            ['location' => 'Ha Noi', 'rating' => 5]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Minh Quan - OEM Studio', 'content' => 'Gia tham chieu, MOQ va quy cach hien thi ro ngay tren storefront nen doi van hanh cua chung toi check du lieu rat nhanh.'],
            ['location' => 'TP. HCM', 'rating' => 5]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Bao Ngoc - Workshop Supply', 'content' => 'Tinh than B2B ro hon truoc rat nhieu, dac biet la luong dat mua si va trang noi dung co the tu sua trong admin.'],
            ['location' => 'Da Nang', 'rating' => 4]
        );

        Banner::updateOrCreate(
            ['title' => 'Diva Materials'],
            [
                'subtitle' => 'B2B Supply Hub',
                'image' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?q=80&w=2070&auto=format&fit=crop',
                'link' => '/shop',
                'button_text' => 'Xem catalog',
                'is_active' => true,
                'sort_order' => 1
            ]
        );
    }
}
