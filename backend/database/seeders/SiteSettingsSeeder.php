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
            'site_tagline' => 'Nguyên liệu và giải pháp B2B',
            'site_title' => 'Diva Materials | Nguyên liệu và giải pháp B2B cho thương hiệu mùi hương',
            'logo_url' => 'https://images.unsplash.com/photo-1560179707-f14e90ef3623?q=80&w=240&auto=format&fit=crop',
            'header_cta_label' => 'Quản trị nội dung',
            'header_cta_url' => '/admin',
            'contact_email' => 'sales@divamaterials.vn',
            'contact_phone' => '+84 28 7300 8899',
            'sales_phone' => '+84 909 888 668',
            'address' => '123 Nguyễn Lương Bằng, Quận 7, TP. Hồ Chí Minh',
            'footer_about' => 'Nền tảng cung ứng nguyên liệu và phụ liệu cho nhà máy, workshop và thương mại với quy trình báo giá nhanh, MOQ rõ ràng và hỗ trợ tài liệu kỹ thuật.',
            'footer_company_heading' => 'Điều hướng',
            'footer_catalog_heading' => 'Danh mục',
            'footer_support_heading' => 'Hỗ trợ',
            'footer_resources_heading' => 'Tài nguyên',
            'footer_contact_heading' => 'Liên hệ',
            'footer_cta_label' => 'Gửi yêu cầu mua sỉ',
            'footer_cta_url' => '/checkout',
            'footer_bottom_text' => '© 2026 Diva Materials. Nền tảng cung ứng nguyên liệu cho doanh nghiệp.',
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
