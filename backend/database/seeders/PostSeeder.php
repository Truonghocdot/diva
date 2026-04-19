<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();
        if (!$author) {
            return;
        }

        $categories = [
            ['name' => 'Vận hành mua sỉ', 'slug' => 'van-hanh-mua-si', 'description' => 'Tư duy xây dựng catalog và quy trình chốt đơn B2B.'],
            ['name' => 'Nghiên cứu & phát triển', 'slug' => 'nghien-cuu-phat-trien', 'description' => 'Kinh nghiệm chọn nguyên liệu và kiểm soát công thức.'],
            ['name' => 'CMS & nội dung', 'slug' => 'cms-noi-dung', 'description' => 'Quản trị page, menu, preview và revision cho storefront doanh nghiệp.'],
        ];

        foreach ($categories as $cat) {
            $category = PostCategory::updateOrCreate(['slug' => $cat['slug']], $cat);

            if ($cat['slug'] === 'van-hanh-mua-si') {
                Post::updateOrCreate([
                    'slug' => Str::slug('5 nguyên tắc xây dựng catalog nguyên liệu cho đội mua hàng'),
                ], [
                    'category_id' => $category->id,
                    'author_id' => $author->id,
                    'title' => '5 nguyên tắc xây dựng catalog nguyên liệu cho đội mua hàng',
                    'excerpt' => 'Từ SKU, quy cách đóng gói đến MOQ, đây là những lớp dữ liệu giúp đội mua hàng và workshop tra cứu catalog nhanh hơn.',
                    'content' => '<p>Một catalog B2B hiệu quả cần cho người mua thấy được dữ liệu họ cần ngay ở lần quét đầu tiên. Khi xây dựng nội dung cho storefront, bạn nên chuẩn hóa ít nhất năm lớp thông tin.</p><h2>1. Tên thương mại và SKU</h2><p>Đây là cặp dữ liệu giúp đối chiếu nhanh giữa hệ thống nội bộ, báo giá và website.</p><h2>2. MOQ và quy cách đóng gói</h2><p>Nếu không hiển thị rõ từ đầu, khách hàng B2B rất khó đánh giá sản phẩm có phù hợp để đi tiếp hay không.</p><h2>3. Đơn vị tính và lead time</h2><p>Hai yếu tố này tác động trực tiếp đến kế hoạch đặt hàng và năng lực xoay vòng tồn kho của doanh nghiệp.</p>',
                    'image' => null,
                    'status' => 'published',
                    'published_at' => now(),
                ]);
            }

            if ($cat['slug'] === 'nghien-cuu-phat-trien') {
                Post::updateOrCreate([
                    'slug' => Str::slug('cách chọn hương liệu cho dòng sản phẩm signature'),
                ], [
                    'category_id' => $category->id,
                    'author_id' => $author->id,
                    'title' => 'Cách chọn hương liệu cho dòng sản phẩm signature',
                    'excerpt' => 'Với sản phẩm B2B, hương liệu nên được đánh giá theo độ bám mùi, độ ổn định giữa các batch và khả năng tài liệu hóa tiêu chuẩn.',
                    'content' => '<p>Khi làm việc với hương liệu cho nến, reed diffuser hay room spray, đội R&D thường ưu tiên ba yếu tố cốt lõi.</p><h2>1. Độ bám mùi</h2><p>Hương cần giữ được profile sau khi phối vào nền nguyên liệu và sau giai đoạn curing hoặc ổn định thành phẩm.</p><h2>2. Tính ổn định giữa các batch</h2><p>Khả năng tái lập mùi ở nhiều lô nhập là yếu tố quan trọng nếu thương hiệu muốn duy trì một dòng signature nhất quán.</p><h2>3. Hồ sơ kỹ thuật</h2><p>IFRA, flash point và các lưu ý ứng dụng nên được chuẩn hóa để đội sản xuất lẫn đội content cùng sử dụng.</p>',
                    'image' => null,
                    'status' => 'published',
                    'published_at' => now(),
                ]);
            }
        }
    }
}
