<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Diva Materials',
            'site_tagline' => 'B2B Supply Hub',
            'site_title' => 'Diva Materials | Wholesale raw materials for makers',
            'logo_url' => 'https://images.unsplash.com/photo-1560179707-f14e90ef3623?q=80&w=240&auto=format&fit=crop',
            'header_cta_label' => 'Quan tri noi dung',
            'header_cta_url' => '/admin',
            'contact_email' => 'sales@divamaterials.vn',
            'contact_phone' => '+84 28 7300 8899',
            'sales_phone' => '+84 909 888 668',
            'address' => '123 Nguyen Luong Bang, Quan 7, TP. Ho Chi Minh',
            'footer_about' => 'Nen tang cung ung nguyen lieu va phu lieu cho nha may, workshop va thuong mai voi quy trinh bao gia nhanh, MOQ ro rang va ho tro tai lieu ky thuat.',
            'footer_company_heading' => 'Dieu huong',
            'footer_catalog_heading' => 'Danh muc',
            'footer_support_heading' => 'Ho tro',
            'footer_resources_heading' => 'Tai nguyen',
            'footer_contact_heading' => 'Lien he',
            'footer_cta_label' => 'Gui yeu cau mua si',
            'footer_cta_url' => '/checkout',
            'footer_bottom_text' => '© 2026 Diva Materials. Wholesale supply for makers.',
            'facebook_url' => 'https://facebook.com/divamaterials',
            'instagram_url' => 'https://instagram.com/divamaterials',
            'linkedin_url' => 'https://linkedin.com/company/divamaterials',
            'zalo_url' => 'https://zalo.me/divamaterials',
        ];

        foreach ($settings as $key => $value) {
            Setting::writeValue($key, $value);
        }
    }
}
