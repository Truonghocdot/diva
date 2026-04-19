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
            $category = PostCategory::updateOrCreate(['slug' => $cat['slug']], $cat);

            if ($cat['slug'] === 'meo-huong-dan') {
                Post::updateOrCreate([
                    'slug' => Str::slug('5 cach lap danh muc nguyen lieu cho workshop hieu qua'),
                ], [
                    'category_id' => $category->id,
                    'author_id' => $author->id,
                    'title' => '5 cach lap danh muc nguyen lieu cho workshop hieu qua',
                    'excerpt' => 'Tu SKU, quy cach dong goi den MOQ, day la nhung truong du lieu quan trong giup doi mua hang va workshop doc catalog nhanh hon.',
                    'content' => '<p>Mot catalog B2B tot can ro ngay tu ten hang, quy cach dong goi va don vi tinh. Khi soan noi dung cho storefront, ban nen co it nhat cac truong sau:</p><h2>1. SKU va ten thuong mai</h2><p>Giup doi mua hang doi chieu nhanh giua don noi bo va san pham tren web.</p><h2>2. MOQ va pack size</h2><p>Day la thong tin quan trong nhat de khach B2B quyet dinh co tiep tuc xem san pham hay khong.</p>',
                    'image' => null,
                    'status' => 'published',
                    'published_at' => now(),
                ]);
            }

            if ($cat['slug'] === 'kien-thuc-huong-thom') {
                Post::updateOrCreate([
                    'slug' => Str::slug('chon huong lieu cho dong san pham signature'),
                ], [
                    'category_id' => $category->id,
                    'author_id' => $author->id,
                    'title' => 'Chon huong lieu cho dong san pham signature',
                    'excerpt' => 'Voi san pham B2B, huong lieu can duoc chon theo kha nang bam mui, flash point va su on dinh giua cac batch.',
                    'content' => '<p>Khi lam viec voi huong lieu cho nen, reed diffuser hay room spray, doi R&D thuong uu tien ba yeu to:</p><h2>1. Kha nang bam mui</h2><p>Huong can giu duoc profile sau khi lot vao wax va sau giai doan curing.</p><h2>2. Flash point va tai lieu IFRA</h2><p>Day la thong tin can co de doi ky thuat danh gia muc do phu hop cua huong lieu voi tung dong san pham.</p>',
                    'image' => null,
                    'status' => 'published',
                    'published_at' => now(),
                ]);
            }
        }
    }
}
