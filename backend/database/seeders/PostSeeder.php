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
        if (!$author) return;

        $categories = [
            ['name' => 'Mẹo & Hướng dẫn', 'slug' => 'meo-huong-dan', 'description' => 'Cách chăm sóc nến và tối ưu mùi hương.'],
            ['name' => 'Câu chuyện thương hiệu', 'slug' => 'cau-chuyen-thuong-hieu', 'description' => 'Hành trình sáng tạo của Diva.'],
            ['name' => 'Kiến thức hương thơm', 'slug' => 'kien-thuc-huong-thom', 'description' => 'Tìm hiểu về các tầng hương và tác dụng.'],
        ];

        foreach ($categories as $cat) {
            $category = PostCategory::create($cat);

            if ($cat['slug'] === 'meo-huong-dan') {
                Post::create([
                    'category_id' => $category->id,
                    'author_id' => $author->id,
                    'title' => '5 Mẹo giúp nến thơm cháy đều và bền lâu',
                    'slug' => Str::slug('5 Mẹo giúp nến thơm cháy đều và bền lâu'),
                    'excerpt' => 'Bạn có bao giờ gặp tình trạng nến bị thụt tim hoặc cháy không đều? Hãy cùng khám phá bí quyết để tận hưởng hũ nến của bạn một cách trọn vẹn nhất.',
                    'content' => '<p>Chăm sóc nến thơm không chỉ là thắp lửa. Để hũ nến yêu thích của bạn không bị "lãng phí", hãy lưu ý những điều sau:</p><h2>1. Luôn cắt bấc nến</h2><p>Trước mỗi lần thắp, hãy cắt bấc nến còn khoảng 0.5cm. Điều này giúp ngọn lửa cháy ổn định, không bị khói đen.</p><h2>2. Thắp nến đủ thời gian</h2><p>Trong lần thắp đầu tiên, hãy để nến cháy ít nhất 2 giờ cho đến khi toàn bộ bề mặt sáp tan chảy hoàn toàn. Điều này ngăn chặn hiện tượng lũng giữa (tunneling).</p>',
                    'image' => null,
                    'status' => 'published',
                    'published_at' => now(),
                ]);
            }

            if ($cat['slug'] === 'kien-thuc-huong-thom') {
                Post::create([
                    'category_id' => $category->id,
                    'author_id' => $author->id,
                    'title' => 'Tâm lý học về mùi hương: Chọn hương gì để thư giãn?',
                    'slug' => Str::slug('Tam ly hoc ve mui huong: Chon huong gi de thu gian?'),
                    'excerpt' => 'Mùi hương có khả năng tác động mạnh mẽ đến cảm xúc và trí nhớ. Vậy đâu là nốt hương lý tưởng cho giấc ngủ ngon?',
                    'content' => '<p>Mùi hương không chỉ mang lại sự thơm tho cho căn phòng, nó còn là một công cụ trị liệu tâm lý mạnh mẽ.</p><h2>Lavender (Oải hương)</h2><p>Đứng đầu danh sách các loại hương giúp giảm căng thẳng và cải thiện chất lượng giấc ngủ.</p><h2>Sandalwood (Gỗ đàn hương)</h2><p>Mang lại cảm giác ấm áp, vững chãi, rất phù hợp cho những buổi thiền định hoặc tập trung làm việc.</p>',
                    'image' => null,
                    'status' => 'published',
                    'published_at' => now(),
                ]);
            }
        }
    }
}
