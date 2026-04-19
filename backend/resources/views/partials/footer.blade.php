@php
    $brandName = $siteSettings['site_name'] ?? 'Diva Materials';
    $footerAbout = $siteSettings['footer_about'] ?? 'Nền tảng cung ứng nguyên liệu và phụ liệu cho nhà máy, workshop và thương mại với quy trình báo giá nhanh, MOQ rõ ràng và hỗ trợ tài liệu kỹ thuật.';
    $footerCtaLabel = $siteSettings['footer_cta_label'] ?? 'Gửi yêu cầu mua sỉ';
    $footerCtaUrl = $siteSettings['footer_cta_url'] ?? '/checkout';
    $footerBottomText = $siteSettings['footer_bottom_text'] ?? ('© 2026 ' . $brandName . '. Nền tảng cung ứng nguyên liệu cho doanh nghiệp.');
    $contactEmail = $siteSettings['contact_email'] ?? 'sales@divamaterials.vn';
    $contactPhone = $siteSettings['sales_phone'] ?? ($siteSettings['contact_phone'] ?? '+84 28 7300 8899');
    $address = $siteSettings['address'] ?? '123 Nguyễn Lương Bằng, Quận 7, TP. Hồ Chí Minh';
    $footerCompanyHeading = $siteSettings['footer_company_heading'] ?? 'Điều hướng';
    $footerCatalogHeading = $siteSettings['footer_catalog_heading'] ?? 'Danh mục';
    $footerSupportHeading = $siteSettings['footer_support_heading'] ?? 'Hỗ trợ';
    $footerResourcesHeading = $siteSettings['footer_resources_heading'] ?? 'Tài nguyên';
    $footerContactHeading = $siteSettings['footer_contact_heading'] ?? 'Liên hệ';
    $footerCompanyMenu = $siteMenus['footer_company']->items ?? [
        ['label' => 'Trang chủ', 'url' => '/'],
        ['label' => 'Về chúng tôi', 'url' => '/about'],
        ['label' => 'Bài viết', 'url' => '/blog'],
    ];
    $footerCatalogMenu = $siteMenus['footer_catalog']->items ?? [
        ['label' => 'Catalog nguyên liệu', 'url' => '/shop'],
        ['label' => 'Gửi yêu cầu', 'url' => '/checkout'],
    ];
    $footerSupportMenu = $siteMenus['footer_support']->items ?? [];
    $footerResourcesMenu = $siteMenus['footer_resources']->items ?? [];
    $facebookUrl = $siteSettings['facebook_url'] ?? null;
    $instagramUrl = $siteSettings['instagram_url'] ?? null;
    $linkedinUrl = $siteSettings['linkedin_url'] ?? null;
    $zaloUrl = $siteSettings['zalo_url'] ?? null;
@endphp

<footer class="mt-24 border-t border-outline-variant/80 bg-white">
    <div class="mx-auto max-w-screen-2xl px-6 pt-16 md:px-8">
        <section class="panel-tint rounded-[2rem] px-8 py-10 md:px-12 md:py-12">
            <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
                <div class="space-y-4">
                    <span class="inline-flex rounded-full border border-secondary/20 bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-secondary">Thiết kế theo tinh thần Catchers</span>
                    <h2 class="max-w-3xl font-headline text-5xl leading-none text-primary md:text-6xl">Không chỉ bán nguyên liệu, mà còn trình bày hệ thống nội dung như một CMS thật.</h2>
                    <p class="max-w-2xl text-base leading-8 text-on-surface-variant">{{ $footerAbout }}</p>
                </div>
                <div class="space-y-4 lg:justify-self-end">
                    <a href="{{ $footerCtaUrl }}" class="inline-flex w-full items-center justify-center rounded-full bg-primary px-7 py-4 text-sm font-semibold uppercase tracking-[0.16em] text-white transition hover:bg-primary-dim lg:w-auto">
                        {{ $footerCtaLabel }}
                    </a>
                    <div class="grid gap-3 sm:grid-cols-2">
                        <div class="rounded-[1.5rem] border border-outline-variant/80 bg-white px-5 py-4">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Hotline mua sỉ</p>
                            <p class="mt-2 text-sm font-semibold text-primary">{{ $contactPhone }}</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-outline-variant/80 bg-white px-5 py-4">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Email</p>
                            <p class="mt-2 text-sm font-semibold text-primary">{{ $contactEmail }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-12 py-14 md:grid-cols-2 xl:grid-cols-[1.2fr_repeat(4,0.8fr)]">
            <div class="space-y-6">
                <div>
                    <span class="font-headline text-5xl leading-none text-primary">{{ $brandName }}</span>
                    <p class="mt-4 max-w-md text-sm leading-8 text-on-surface-variant">{{ $footerAbout }}</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    @foreach([
                        ['label' => 'Facebook', 'url' => $facebookUrl],
                        ['label' => 'Instagram', 'url' => $instagramUrl],
                        ['label' => 'LinkedIn', 'url' => $linkedinUrl],
                        ['label' => 'Zalo', 'url' => $zaloUrl],
                    ] as $social)
                        @if(!empty($social['url']))
                            <a href="{{ $social['url'] }}" class="rounded-full border border-outline-variant bg-surface-container-low px-4 py-2 text-xs font-semibold uppercase tracking-[0.16em] text-primary transition hover:border-secondary hover:text-secondary" target="_blank" rel="noreferrer">
                                {{ $social['label'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-secondary">{{ $footerCompanyHeading }}</span>
                @include('partials.footer-menu-tree', ['items' => $footerCompanyMenu, 'level' => 0])
            </div>
            <div class="flex flex-col gap-4">
                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-secondary">{{ $footerCatalogHeading }}</span>
                @include('partials.footer-menu-tree', ['items' => $footerCatalogMenu, 'level' => 0])
            </div>
            <div class="flex flex-col gap-4">
                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-secondary">{{ $footerSupportHeading }}</span>
                @include('partials.footer-menu-tree', ['items' => $footerSupportMenu, 'level' => 0])
            </div>
            <div class="flex flex-col gap-4">
                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-secondary">{{ $footerResourcesHeading }}</span>
                @include('partials.footer-menu-tree', ['items' => $footerResourcesMenu, 'level' => 0])
                <div class="space-y-2 pt-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-secondary">{{ $footerContactHeading }}</span>
                    <p class="text-sm leading-7 text-on-surface-variant">{{ $address }}</p>
                    <p class="text-sm text-on-surface-variant">{{ $contactEmail }}</p>
                    <p class="text-sm text-on-surface-variant">{{ $contactPhone }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t border-outline-variant/80">
        <div class="mx-auto flex max-w-screen-2xl flex-col items-center justify-between gap-4 px-6 py-8 text-[11px] font-medium uppercase tracking-[0.18em] text-on-surface-variant md:flex-row md:px-8">
            <span>{{ $footerBottomText }}</span>
            <span>MOQ minh bạch. Báo giá nhanh. Hỗ trợ tài liệu kỹ thuật.</span>
        </div>
    </div>
</footer>
