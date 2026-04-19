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
                'summary' => 'Nen tang cung ung nguyen lieu va phu lieu mua si cho doanh nghiep san xuat.',
                'is_published' => true,
                'is_homepage' => true,
                'meta_title' => 'Diva Materials | Wholesale raw materials for makers',
                'meta_description' => 'Cung cap sap, huong lieu, bao bi, bac va dung cu cho nha may, workshop va doi mua hang B2B.',
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'eyebrow' => 'Wholesale supply for makers',
                            'title' => 'Nguon cung nguyen lieu on dinh cho san xuat va thuong mai',
                            'content' => 'Diva Materials giup doi mua hang va workshop dat nguyen lieu nhanh hon voi catalog ro rang, MOQ minh bach va trang noi dung co the quan tri linh hoat tu admin.',
                            'primary_button_label' => 'Xem catalog',
                            'primary_button_url' => '/shop',
                            'secondary_button_label' => 'Dat mua si',
                            'secondary_button_url' => '/checkout',
                            'image' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?q=80&w=1400&auto=format&fit=crop',
                        ],
                    ],
                    [
                        'type' => 'stats',
                        'data' => [
                            'heading' => 'Nang luc van hanh huong toi mua si',
                            'items' => [
                                ['value' => '100+', 'label' => 'SKU vat tu', 'description' => 'Tu sap, huong lieu den bao bi va dung cu san xuat.'],
                                ['value' => '24h', 'label' => 'Phan hoi bao gia', 'description' => 'Xu ly nhanh cho don mau va don lap ke hoach san xuat.'],
                                ['value' => 'MOQ linh hoat', 'label' => 'Dat theo nhu cau', 'description' => 'Ho tro tu workshop nho den don tai cung ung dinh ky.'],
                                ['value' => 'CMS noi dung', 'label' => 'Quan tri landing page', 'description' => 'Tu chu sua trang gioi thieu, landing page, chinh sach va CTA.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'feature_cards',
                        'data' => [
                            'heading' => 'Toi uu cho doanh nghiep mua si',
                            'intro' => 'Khong chi ban hang, giao dien moi tap trung vao trinh bay quy cach, tai lieu ky thuat va luong thong tin can cho doi mua hang.',
                            'items' => [
                                ['title' => 'Thong tin mua si ro rang', 'content' => 'San pham hien gia tham chieu, don vi tinh, MOQ, quy cach dong goi, xuat xu va lead time ngay tren trang chi tiet.'],
                                ['title' => 'Dat hang theo doanh nghiep', 'content' => 'Checkout duoc chuyen thanh luong dat mua si voi ten cong ty, ma so thue, dau moi lien he va ghi chu don hang.'],
                                ['title' => 'Noi dung quan tri nhu landing page', 'content' => 'Filament duoc nang cap bang page builder block-based de sua trang chu, gioi thieu va trang noi dung khac nhanh nhu WordPress page.'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'category_grid',
                        'data' => [
                            'heading' => 'Danh muc nguyen lieu chinh',
                            'intro' => 'Bat dau tu nhom vat tu ma doi mua hang hay lap lai nhat: sap, huong lieu, bac, dung cu va bao bi.',
                        ],
                    ],
                    [
                        'type' => 'product_showcase',
                        'data' => [
                            'heading' => 'San pham b2b noi bat',
                            'intro' => 'Mau du lieu da duoc doi tu retail candle sang nguyen lieu va phu lieu de phu hop voi mo hinh thuong mai mua si.',
                            'source' => 'featured',
                            'limit' => 6,
                        ],
                    ],
                    [
                        'type' => 'call_to_action',
                        'data' => [
                            'heading' => 'Can bang gia theo quy cach rieng?',
                            'content' => 'Gui don mua si de doi ngu Diva Materials kiem tra ton kho, quy cach dong goi va de xuat gia cho ke hoach san xuat cua ban.',
                            'button_label' => 'Gui yeu cau ngay',
                            'button_url' => '/checkout',
                        ],
                    ],
                ],
            ],
        );

        Page::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'Ve chung toi',
                'summary' => 'Diva Materials chuyen cung ung nguyen lieu va phu lieu cho he sinh thai nha san xuat quy mo vua va nho.',
                'is_published' => true,
                'is_homepage' => false,
                'meta_title' => 'Ve chung toi | Diva Materials',
                'meta_description' => 'Tim hieu cach Diva Materials xay dung nen tang cung ung B2B linh hoat cho workshop va doanh nghiep san xuat.',
                'content' => [
                    [
                        'type' => 'hero',
                        'data' => [
                            'eyebrow' => 'About Diva Materials',
                            'title' => 'Tu showroom cam hung den he thong cung ung B2B',
                            'content' => 'Du an duoc chuyen doi de phuc vu doanh nghiep mua si: giao dien sach hon, thong tin ky thuat day du hon va admin quan tri noi dung linh hoat hon.',
                            'primary_button_label' => 'Xem catalog',
                            'primary_button_url' => '/shop',
                            'secondary_button_label' => 'Doc tin tuc',
                            'secondary_button_url' => '/blog',
                            'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1400&auto=format&fit=crop',
                        ],
                    ],
                    [
                        'type' => 'rich_text',
                        'data' => [
                            'heading' => 'Mo hinh van hanh',
                            'content' => '<p>Diva Materials huong toi vai tro mot <strong>B2B supply hub</strong> cho workshop, nha may nho va doi thuong mai. Moi trang san pham can co du lieu mua si ro rang: gia tham chieu, don vi, MOQ, lead time, quy cach va thong tin xuat xu.</p><p>Song song voi do, bo phan kinh doanh can mot he thong de sua cac trang gioi thieu, landing page va CTA nhanh ma khong can chinh code. Vi vay, admin Filament duoc bo sung page builder theo block de xu ly tinh huong nay.</p>',
                        ],
                    ],
                    [
                        'type' => 'feature_cards',
                        'data' => [
                            'heading' => 'Nhung gi chung toi uu tien',
                            'intro' => 'Ba tru cot cua phien ban moi la cung ung, du lieu mua si va tu chu noi dung.',
                            'items' => [
                                ['title' => 'Thong tin co cau hoa', 'content' => 'Du lieu san pham duoc bo sung SKU, don vi, MOQ, quy cach dong goi, xuat xu va lead time.'],
                                ['title' => 'Trinh bay phu hop mua hang', 'content' => 'Storefront duoc doi sang gam trang xanh duong de mang cam giac sach, ky thuat va tin cay hon cho B2B.'],
                                ['title' => 'Page builder trong admin', 'content' => 'Noi dung landing page duoc quan tri theo block, giup doi content van hanh nhanh nhu WordPress page.'],
                            ],
                        ],
                    ],
                ],
            ],
        );
    }
}
