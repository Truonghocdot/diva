<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::updateOrCreate(
            ['slug' => 'primary-menu'],
            [
                'name' => 'Primary Menu',
                'location' => 'primary',
                'is_active' => true,
                'items' => [
                    [
                        'label' => 'Về chúng tôi',
                        'url' => '/about',
                        'open_in_new_tab' => false,
                        'is_highlight' => false,
                        'children' => [
                            ['label' => 'Hồ sơ năng lực', 'url' => '/about', 'open_in_new_tab' => false, 'children' => []],
                            ['label' => 'Năng lực cung ứng', 'url' => '/about', 'open_in_new_tab' => false, 'children' => []],
                            ['label' => 'Bài viết & cập nhật', 'url' => '/blog', 'open_in_new_tab' => false, 'children' => []],
                        ],
                    ],
                    [
                        'label' => 'Dịch vụ B2B',
                        'url' => '/about',
                        'open_in_new_tab' => false,
                        'is_highlight' => false,
                        'children' => [
                            ['label' => 'Gia công mùi hương', 'url' => '/about', 'open_in_new_tab' => false, 'children' => []],
                            ['label' => 'Tư vấn công thức', 'url' => '/about', 'open_in_new_tab' => false, 'children' => []],
                            ['label' => 'Thiết kế landing page nội dung', 'url' => '/about', 'open_in_new_tab' => false, 'children' => []],
                        ],
                    ],
                    [
                        'label' => 'Nguyên liệu',
                        'url' => '/shop',
                        'open_in_new_tab' => false,
                        'is_highlight' => false,
                        'children' => [
                            ['label' => 'Sáp nến soy', 'url' => '/shop?category=soy-wax', 'open_in_new_tab' => false, 'children' => []],
                            [
                                'label' => 'Hương liệu',
                                'url' => '/shop?category=fragrance-oils',
                                'open_in_new_tab' => false,
                                'children' => [
                                    ['label' => 'Dòng signature', 'url' => '/shop?category=fragrance-oils', 'open_in_new_tab' => false],
                                    ['label' => 'Room spray & diffuser', 'url' => '/shop?category=fragrance-oils', 'open_in_new_tab' => false],
                                ],
                            ],
                            ['label' => 'Bấc và dụng cụ', 'url' => '/shop?category=wick-and-tools', 'open_in_new_tab' => false, 'children' => []],
                            ['label' => 'Bao bì', 'url' => '/shop?category=packaging', 'open_in_new_tab' => false, 'children' => []],
                        ],
                    ],
                    [
                        'label' => 'Tài nguyên',
                        'url' => '/blog',
                        'open_in_new_tab' => false,
                        'is_highlight' => false,
                        'children' => [
                            ['label' => 'Kiến thức nguyên liệu', 'url' => '/blog', 'open_in_new_tab' => false, 'children' => []],
                            ['label' => 'Hướng dẫn mua sỉ', 'url' => '/checkout', 'open_in_new_tab' => false, 'children' => []],
                        ],
                    ],
                    ['label' => 'Gửi yêu cầu', 'url' => '/checkout', 'open_in_new_tab' => false, 'is_highlight' => true, 'children' => []],
                ],
            ],
        );

        Menu::updateOrCreate(
            ['slug' => 'footer-company-menu'],
            [
                'name' => 'Footer Company Menu',
                'location' => 'footer_company',
                'is_active' => true,
                'items' => [
                    ['label' => 'Trang chủ', 'url' => '/', 'open_in_new_tab' => false],
                    ['label' => 'Về chúng tôi', 'url' => '/about', 'open_in_new_tab' => false, 'children' => [
                        ['label' => 'Hồ sơ năng lực', 'url' => '/about', 'open_in_new_tab' => false],
                        ['label' => 'Đội ngũ & quy trình', 'url' => '/about', 'open_in_new_tab' => false],
                    ]],
                    ['label' => 'Bài viết', 'url' => '/blog', 'open_in_new_tab' => false],
                ],
            ],
        );

        Menu::updateOrCreate(
            ['slug' => 'footer-catalog-menu'],
            [
                'name' => 'Footer Catalog Menu',
                'location' => 'footer_catalog',
                'is_active' => true,
                'items' => [
                    ['label' => 'Catalog nguyên liệu', 'url' => '/shop', 'open_in_new_tab' => false],
                    ['label' => 'Sáp nến soy', 'url' => '/shop?category=soy-wax', 'open_in_new_tab' => false],
                    ['label' => 'Hương liệu', 'url' => '/shop?category=fragrance-oils', 'open_in_new_tab' => false, 'children' => [
                        ['label' => 'Dòng signature', 'url' => '/shop?category=fragrance-oils', 'open_in_new_tab' => false],
                        ['label' => 'Diffuser & room spray', 'url' => '/shop?category=fragrance-oils', 'open_in_new_tab' => false],
                    ]],
                    ['label' => 'Bấc và dụng cụ', 'url' => '/shop?category=wick-and-tools', 'open_in_new_tab' => false],
                    ['label' => 'Bao bì', 'url' => '/shop?category=packaging', 'open_in_new_tab' => false],
                ],
            ],
        );

        Menu::updateOrCreate(
            ['slug' => 'footer-support-menu'],
            [
                'name' => 'Footer Support Menu',
                'location' => 'footer_support',
                'is_active' => true,
                'items' => [
                    ['label' => 'Hướng dẫn đặt mua sỉ', 'url' => '/checkout', 'open_in_new_tab' => false],
                    ['label' => 'Báo giá và công nợ', 'url' => '/checkout', 'open_in_new_tab' => false],
                    ['label' => 'Liên hệ kinh doanh', 'url' => '/checkout', 'open_in_new_tab' => false],
                ],
            ],
        );

        Menu::updateOrCreate(
            ['slug' => 'footer-resources-menu'],
            [
                'name' => 'Footer Resources Menu',
                'location' => 'footer_resources',
                'is_active' => true,
                'items' => [
                    ['label' => 'Kiến thức nguyên liệu', 'url' => '/blog', 'open_in_new_tab' => false],
                    ['label' => 'Kinh nghiệm vận hành B2B', 'url' => '/blog', 'open_in_new_tab' => false],
                    ['label' => 'Trang giới thiệu', 'url' => '/about', 'open_in_new_tab' => false],
                ],
            ],
        );
    }
}
