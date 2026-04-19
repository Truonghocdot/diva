<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Diva Materials',
                'summary' => 'Nền tảng cung ứng nguyên liệu và phụ liệu mua sỉ cho doanh nghiệp sản xuất.',
                'is_published' => true,
                'is_homepage' => true,
                'meta_title' => 'Diva Materials | Nguyên liệu và giải pháp B2B cho thương hiệu mùi hương',
                'meta_description' => 'Cung cấp sáp, hương liệu, bao bì, bấc và dụng cụ cho nhà máy, workshop và đội mua hàng B2B.',
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'eyebrow' => 'Wholesale materials & scent solutions',
                            'title' => 'Hệ sinh thái nguyên liệu dành cho thương hiệu, workshop và đội mua hàng',
                            'content' => 'Diva Materials giúp doanh nghiệp tra cứu catalog nhanh hơn với bố cục sáng, thông tin mua sỉ rõ ràng và hệ CMS cho phép chỉnh sửa từng page như WordPress.',
                            'primary_button_label' => 'Xem catalog',
                            'primary_button_url' => '/shop',
                            'secondary_button_label' => 'Gửi yêu cầu',
                            'secondary_button_url' => '/checkout',
                            'image' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?q=80&w=1400&auto=format&fit=crop',
                        ],
                    ],
                    [
                        'type' => 'stats',
                        'data' => [
                            'heading' => 'Năng lực vận hành hướng tới mua sỉ',
                            'items' => [
                                ['value' => '120+', 'label' => 'Mã vật tư', 'description' => 'Từ sáp, hương liệu, bao bì đến bấc và dụng cụ sản xuất.'],
                                ['value' => '24h', 'label' => 'Phản hồi báo giá', 'description' => 'Phù hợp cho đội mua hàng cần chốt mẫu và kế hoạch nhập lô.'],
                                ['value' => 'MOQ rõ', 'label' => 'Dễ lập đơn', 'description' => 'Quy cách, đơn vị tính và tồn kho tham chiếu hiển thị trực tiếp trên web.'],
                                ['value' => 'CMS thật', 'label' => 'Quản trị nội dung', 'description' => 'Page builder, preview, draft và revision history nằm ngay trong admin.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_cards',
                        'data' => [
                            'heading' => 'Thiết kế lại để phục vụ doanh nghiệp mua sỉ',
                            'intro' => 'Không còn là storefront bán lẻ. Phiên bản mới tập trung vào nhịp nội dung rõ ràng, màu sắc trắng xanh và khả năng quản trị sâu giống một CMS thực thụ.',
                            'items' => [
                                ['title' => 'Thông tin mua sỉ có cấu trúc', 'content' => 'Trang sản phẩm hiển thị giá tham chiếu, MOQ, đơn vị tính, quy cách đóng gói, lead time và xuất xứ một cách dễ quét.'],
                                ['title' => 'Header, footer và menu nhiều cấp', 'content' => 'Menu builder hỗ trợ nhiều tầng hơn, footer tách theo từng cột để đội nội dung chủ động cập nhật từng nhóm liên kết.'],
                                ['title' => 'CMS linh hoạt như WordPress', 'content' => 'Đội vận hành có thể chỉnh sửa từng page, xem trước bản nháp, theo dõi revision và giữ chất lượng nội dung đồng bộ toàn site.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'category_grid',
                        'data' => [
                            'heading' => 'Danh mục nguyên liệu chính',
                            'intro' => 'Bắt đầu từ các nhóm mà doanh nghiệp mua hàng truy cập nhiều nhất: sáp nến, hương liệu, bấc, dụng cụ và bao bì.',
                        ],
                    ],
                    [
                        'type' => 'product_showcase',
                        'data' => [
                            'heading' => 'Sản phẩm B2B nổi bật',
                            'intro' => 'Dữ liệu mẫu đã được chuyển sang ngôn ngữ nguyên liệu và phụ liệu, phù hợp với mô hình thương mại mua sỉ.',
                            'source' => 'featured',
                            'limit' => 6,
                        ],
                    ],
                    [
                        'type' => 'call_to_action',
                        'data' => [
                            'heading' => 'Cần báo giá theo quy cách riêng?',
                            'content' => 'Gửi đơn mua sỉ để đội ngũ Diva Materials kiểm tra tồn kho, quy cách đóng gói và đề xuất giá cho kế hoạch sản xuất của bạn.',
                            'button_label' => 'Gửi yêu cầu ngay',
                            'button_url' => '/checkout',
                        ],
                    ],
                ],
            ],
        );

        Page::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'Về chúng tôi',
                'summary' => 'Diva Materials chuyên cung ứng nguyên liệu và phụ liệu cho hệ sinh thái nhà sản xuất quy mô vừa và nhỏ.',
                'is_published' => true,
                'is_homepage' => false,
                'meta_title' => 'Về chúng tôi | Diva Materials',
                'meta_description' => 'Tìm hiểu cách Diva Materials xây dựng nền tảng cung ứng B2B linh hoạt cho workshop và doanh nghiệp sản xuất.',
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'eyebrow' => 'About Diva Materials',
                            'title' => 'Từ cảm hứng mùi hương đến hệ thống cung ứng B2B hoàn chỉnh',
                            'content' => 'Dự án được tái cấu trúc để phục vụ đội mua hàng doanh nghiệp: giao diện sạch hơn, dữ liệu kỹ thuật rõ hơn và quyền quản trị nội dung linh hoạt hơn.',
                            'primary_button_label' => 'Xem catalog',
                            'primary_button_url' => '/shop',
                            'secondary_button_label' => 'Đọc bài viết',
                            'secondary_button_url' => '/blog',
                            'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1400&auto=format&fit=crop',
                        ],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Mô hình vận hành',
                            'content' => '<p>Diva Materials hướng tới vai trò một <strong>B2B supply hub</strong> cho workshop, nhà máy nhỏ và đội thương mại. Mỗi trang sản phẩm đều ưu tiên dữ liệu quyết định mua hàng như giá tham chiếu, đơn vị, MOQ, lead time, quy cách và thông tin xuất xứ.</p><p>Song song với đó, bộ phận kinh doanh và marketing cần một hệ thống để sửa các trang giới thiệu, landing page và CTA nhanh mà không phụ thuộc đội kỹ thuật. Vì vậy, phần admin được mở rộng với page builder theo block, preview an toàn cho bản nháp và lịch sử chỉnh sửa đầy đủ.</p>',
                        ],
                    ],
                    [
                        'type' => 'feature_cards',
                        'data' => [
                            'heading' => 'Những gì chúng tôi ưu tiên',
                            'intro' => 'Ba trụ cột của phiên bản mới là cung ứng, dữ liệu mua sỉ và tự chủ nội dung.',
                            'items' => [
                                ['title' => 'Thông tin có cấu trúc', 'content' => 'Dữ liệu sản phẩm được bổ sung SKU, đơn vị, MOQ, quy cách đóng gói, xuất xứ và lead time.'],
                                ['title' => 'Ngôn ngữ giao diện doanh nghiệp', 'content' => 'Storefront được tái thiết kế với gam trắng xanh, khoảng thở lớn và bố cục gợi tinh thần catalogue của Catchers.'],
                                ['title' => 'CMS mạnh cho đội nội dung', 'content' => 'Header, footer, page builder, preview và revision giúp đội vận hành chủ động triển khai nội dung như một hệ CMS thực thụ.'],
                            ],
                        ],
                    ],
                ],
            ],
        );
    }
}
