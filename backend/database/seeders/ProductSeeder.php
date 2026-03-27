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
        $signature = Category::updateOrCreate(
            ['slug' => 'signature-collection'],
            [
                'name' => 'Signature Collection',
                'description' => 'Những mùi hương đặc trưng làm nên thương hiệu.',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBOig4HPxH5t3K9Qpico_WppDfCLI9sQtK18ZEgc5g5nEEAZsvgj_7T16MCZz8Wj130pZba3gs_yNbvOda_FMJvjdnBqJ3Y0qXPpkn0QFGhcWzFY4Buh-MMNSOUhhDKuPUdhpXu62dhMXKJrVDy2OjFWP0CjuaRdXb0YU2aovNc3Se-GR5eyqX9RJBuqjsLnzZ6qT1yx0QdgJOfuoC0imNM9FieUM67ftQ2dWQKY4qeuL5Pv0ztTRxIEvMJKg7mT5cptKWUrYCxf9Q'
            ]
        );

        $seasonal = Category::updateOrCreate(
            ['slug' => 'seasonal-collection'],
            [
                'name' => 'Seasonal Collection',
                'description' => 'Bộ sưu tập theo mùa.',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCJkMHzEQjtxuI3etEsfxqB5yld1rY8Ci4MhIducXB7FSsPWfvbMyXjo5TsSQtaxj79afXEStTL9DmhLKNz7REhKRigjnB6Lzy5JJ7-HDXtc8sIsWuPFR88MyREzWwztxOwTtMdIxj1NG3rEQfY3h0-dDR4vYmB22qGSUpdiGv8lwu-kZr2C-dc4uW26uDMg6qEqCzFbJjCQ99Wm2z7bfitlLdPWTEIRrNpIBx0wYPEUclaSSsIwfn-NIc_-j5JPj0cahEBlLRAkUA'
            ]
        );

        $supplies = Category::updateOrCreate(
            ['slug' => 'candle-supplies'],
            [
                'name' => 'Candle Supplies',
                'description' => 'Dụng cụ và nguyên liệu làm nến.',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDe4HsWdK-eMRsfZ0oeLCTOCCenFGOrFSwBcYYKp_SRcNqgoikCLoYfwSgqLim5WLZnnIQf1X4ry1YhUCxXKDH1BV6LC1A80pLbccrAINpCLEkwILWn7X0FRuMTWwOxbjAEh_kwY3wXpQ2g1vVK1IdteVw308yeK8BD7OTAuFi2DaDWXRRwGvX3PU5kH8kl0YA1wLwsxOC2-DSEkLMtik9sHNiq-foeQo-I9VTUQheHICGsZiYubXqojMnWXn7xpP600CAw-_2auC0'
            ]
        );

        $kits = Category::updateOrCreate(
            ['slug' => 'starter-kits'],
            [
                'name' => 'Starter Kits',
                'description' => 'Bộ dụng cụ tự làm nến tại nhà.',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD8I6Xp4-T9LwS7JbX8-R8h8-O8I-7-6-5-4-3-2-1'
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'diy-signature-kit'],
            [
                'category_id' => $kits->id,
                'name' => 'DIY Signature Kit',
                'description' => 'Mọi thứ bạn cần để tự tạo nên hũ nến đầu tiên của mình.',
                'price' => 1250000,
                'stock' => 20,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD-diy-kit-image',
                'wax_type' => 'Various',
                'burn_time' => 'N/A',
                'weight' => '1.5kg',
                'is_featured' => true,
            ]
        );
        Product::updateOrCreate(
            ['slug' => 'rung-thong-sau-mua'],
            [
                'category_id' => $signature->id,
                'name' => 'Rừng Thông Sau Mưa',
                'description' => 'Hương thơm tươi mát của rừng thông sau cơn mưa, mang lại cảm giác bình yên và thư thái cho không gian của bạn.',
                'price' => 750000,
                'stock' => 50,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDHJZcBtI9-JtTJTLzVhz_dDHMCuiY7yNqnXNs3RGkSXF9kIt8dPKnKDEjByKlElXCAXfSqIj-rjEFSZ7esYPR4xwTbc_NRwnerYVywrr1YZfx7hoKp0s5GiQ5lkpTcrgfVML-etAzEXGPity0nBUK0SyQGCGKcpT1zDVerHj7_FcSiyJ2tCwb64HDS0w06ZgC4miSIBXaEECxF2GGl4AuTdW0pt39Rcsdo6lA8dSxjwYGUATO4DJN1sIWoxVujbKKgOz8Xs2aXMa4',
                'wax_type' => 'Soy Wax',
                'burn_time' => '45 Hours',
                'weight' => '250g',
                'scent_top_notes' => ['Pine Needle', 'Bergamot'],
                'scent_middle_notes' => ['Petrichor', 'Wild Juniper'],
                'scent_base_notes' => ['Oakmoss', 'Musk'],
                'is_featured' => true,
                'is_new' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'velvet-woods'],
            [
                'category_id' => $signature->id,
                'name' => 'Velvet Woods',
                'description' => 'Sự kết hợp hoàn hảo giữa gỗ đàn hương ấm áp và hổ phách huyền bí, tạo nên một không gian sang trọng.',
                'price' => 450000,
                'stock' => 100,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAAuubyEC49TdhWDKnG-Uhc7LV6yRcPNEQVonDM3wYlqvE5EzXvG6voYpY0FL5rmCkXzogpMLP2GJV8Jgsm10MKXKd4QvxMnF86PxnFx5Hok91_evw59BttZZFpGKvJb0Lp00LbLspz5ndElqEsCdgyNCRh5GUlcMWklRcv_iEHt-52-18f2nnlcfwojST2_9D_SoY38hsS-1ruI1z43QvFTQiojM1D_XTv2NZJrAmGy9ZQLnGKIWKzCUCbMOSzIV3ncZ9S-xUpwmI',
                'wax_type' => 'Soy Wax',
                'burn_time' => '30 Hours',
                'weight' => '150g',
                'scent_top_notes' => ['Sandalwood'],
                'scent_middle_notes' => ['Amber'],
                'scent_base_notes' => ['Cedarwood'],
                'is_featured' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'nordic-dusk'],
            [
                'category_id' => $seasonal->id,
                'name' => 'Nordic Dusk',
                'description' => 'Mùi hương thanh khiết của hoàng hôn vùng Bắc Âu với sự thanh mát của tuyết và bạch đàn.',
                'price' => 520000,
                'stock' => 30,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDd2hQDpLpoP0HAuSJf3eXzslQpu-mCIolxKr1yFB-MydtX3d6SAP2QnkzCWQf9Iw-lbQElWcUEwMdpd7UeTrBTdb_bP3sqeC9tK5mwSIVaRnj6OPhmDv1ZnlQ1sCdFDQ6eeosnETxuYa3DlHemCzITSkrx-4tomf8h4qNUhDIi97XWo3qsX9rO9QKqJ-ZghckhQqKilohne-ua2V7icW33vFEDKrg2LxqyhID_EiWJ5DWsvE52cNg-F1slyTifCNmZOb0669EmcQw',
                'wax_type' => 'Soy Wax',
                'burn_time' => '40 Hours',
                'weight' => '220g',
                'scent_top_notes' => ['Eucalyptus', 'Mint'],
                'scent_middle_notes' => ['Snow', 'Pine'],
                'scent_base_notes' => ['White Musk'],
                'is_featured' => true,
                'is_new' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'morning-dew'],
            [
                'category_id' => $seasonal->id,
                'name' => 'Morning Dew',
                'description' => 'Cảm nhận sự sảng khoái của buổi sớm mai với hương cỏ xanh và sương sớm.',
                'price' => 480000,
                'stock' => 45,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCmSidg_hs81kzapDUFk21hy9pdAhen0PZpNKY0fybjQKBUerwBhbm_pQDbgOMnxD3broxZVBZPILq_LwU-QI1U9gPRmT-wzj6XI5yibp7-PV4FRcUGbt1YM27kkMmqDuhsqWrAp39nm18Kz-9gQAsR9odJCACCD08Z6ko-HRuJVST-vYkCz9M3w2GWxJE3nVw1Lny_KgVX4MFPVHoVM0xD9NB29cNfBqi3RBhufWojgjkLDp2VPLs8LklAtYvWylY4D5tBu6Pdv_o',
                'wax_type' => 'Soy Wax',
                'burn_time' => '35 Hours',
                'weight' => '180g',
                'scent_top_notes' => ['Green Grass'],
                'scent_middle_notes' => ['Water Lily'],
                'scent_base_notes' => ['Bamboo'],
                'is_featured' => true,
                'is_new' => true,
            ]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Linh Chi', 'content' => 'Mùi hương của The Tactile Sanctuary không chỉ là mùi hương, đó là một trải nghiệm.'],
            ['location' => 'Hà Nội', 'rating' => 5]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Minh Anh', 'content' => 'Thiết kế hũ nến cực kỳ tối giản và sang trọng. Tôi rất thích cách nến tỏa hương.'],
            ['location' => 'TP. HCM', 'rating' => 5]
        );

        Testimonial::updateOrCreate(
            ['user_name' => 'Hoàng Nam', 'content' => 'Giao hàng nhanh và đóng gói rất cẩn thận. Chắc chắn sẽ ủng hộ thêm.'],
            ['location' => 'Đà Nẵng', 'rating' => 4]
        );

        Banner::updateOrCreate(
            ['title' => 'The Tactile Sanctuary'],
            [
                'subtitle' => 'Autumn / Winter 2024',
                'image' => 'https://images.unsplash.com/photo-1602874801007-bd458bb1b8b6?q=80&w=2070&auto=format&fit=crop',
                'link' => '/shop',
                'button_text' => 'Khám phá ngay',
                'is_active' => true,
                'sort_order' => 1
            ]
        );
    }
}
