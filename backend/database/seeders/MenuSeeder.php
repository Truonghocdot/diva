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
                    ['label' => 'Catalog', 'url' => '/shop', 'open_in_new_tab' => false, 'is_highlight' => false, 'children' => [
                        ['label' => 'Sap nen', 'url' => '/shop?category=soy-wax', 'open_in_new_tab' => false, 'children' => []],
                        ['label' => 'Huong lieu', 'url' => '/shop?category=fragrance-oils', 'open_in_new_tab' => false, 'children' => [
                            ['label' => 'Dong signature', 'url' => '/shop?category=fragrance-oils', 'open_in_new_tab' => false],
                        ]],
                    ]],
                    ['label' => 'Ve chung toi', 'url' => '/about', 'open_in_new_tab' => false, 'is_highlight' => false, 'children' => []],
                    ['label' => 'Tin tuc', 'url' => '/blog', 'open_in_new_tab' => false, 'is_highlight' => false, 'children' => []],
                    ['label' => 'Dat mua si', 'url' => '/checkout', 'open_in_new_tab' => false, 'is_highlight' => true, 'children' => []],
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
                    ['label' => 'Trang chu', 'url' => '/', 'open_in_new_tab' => false],
                    ['label' => 'Ve chung toi', 'url' => '/about', 'open_in_new_tab' => false],
                    ['label' => 'Tin tuc', 'url' => '/blog', 'open_in_new_tab' => false],
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
                    ['label' => 'Catalog nguyen lieu', 'url' => '/shop', 'open_in_new_tab' => false],
                    ['label' => 'Sap nen', 'url' => '/shop?category=soy-wax', 'open_in_new_tab' => false],
                    ['label' => 'Huong lieu', 'url' => '/shop?category=fragrance-oils', 'open_in_new_tab' => false],
                    ['label' => 'Bao bi', 'url' => '/shop?category=packaging', 'open_in_new_tab' => false],
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
                    ['label' => 'Chinh sach giao hang', 'url' => '/about', 'open_in_new_tab' => false],
                    ['label' => 'Bao gia va cong no', 'url' => '/checkout', 'open_in_new_tab' => false],
                    ['label' => 'Lien he sales', 'url' => '/checkout', 'open_in_new_tab' => false],
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
                    ['label' => 'Blog nganh', 'url' => '/blog', 'open_in_new_tab' => false],
                    ['label' => 'Huong dan dat mua si', 'url' => '/checkout', 'open_in_new_tab' => false],
                    ['label' => 'Trang gioi thieu', 'url' => '/about', 'open_in_new_tab' => false],
                ],
            ],
        );
    }
}
