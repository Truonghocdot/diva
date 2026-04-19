@php
    $brandName = $siteSettings['site_name'] ?? 'Diva Materials';
    $footerAbout = $siteSettings['footer_about'] ?? 'Nen tang cung ung nguyen lieu va phu lieu cho nha may, workshop va thuong mai voi quy trinh bao gia nhanh, MOQ ro rang va ho tro tai lieu ky thuat.';
    $footerCtaLabel = $siteSettings['footer_cta_label'] ?? 'Gui yeu cau mua si';
    $footerCtaUrl = $siteSettings['footer_cta_url'] ?? '/checkout';
    $footerBottomText = $siteSettings['footer_bottom_text'] ?? ('© 2026 ' . $brandName . '. Wholesale supply for makers.');
    $contactEmail = $siteSettings['contact_email'] ?? 'sales@divamaterials.vn';
    $contactPhone = $siteSettings['sales_phone'] ?? ($siteSettings['contact_phone'] ?? '+84 28 7300 8899');
    $address = $siteSettings['address'] ?? '123 Nguyen Luong Bang, Quan 7, TP. HCM';
    $footerCompanyHeading = $siteSettings['footer_company_heading'] ?? 'Dieu huong';
    $footerCatalogHeading = $siteSettings['footer_catalog_heading'] ?? 'Danh muc';
    $footerSupportHeading = $siteSettings['footer_support_heading'] ?? 'Ho tro';
    $footerResourcesHeading = $siteSettings['footer_resources_heading'] ?? 'Tai nguyen';
    $footerContactHeading = $siteSettings['footer_contact_heading'] ?? 'Lien he';
    $footerCompanyMenu = $siteMenus['footer_company']->items ?? [
        ['label' => 'Trang chu', 'url' => '/'],
        ['label' => 'Ve chung toi', 'url' => '/about'],
        ['label' => 'Tin tuc', 'url' => '/blog'],
    ];
    $footerCatalogMenu = $siteMenus['footer_catalog']->items ?? [
        ['label' => 'Catalog nguyen lieu', 'url' => '/shop'],
        ['label' => 'Dat mua si', 'url' => '/checkout'],
    ];
    $footerSupportMenu = $siteMenus['footer_support']->items ?? [];
    $footerResourcesMenu = $siteMenus['footer_resources']->items ?? [];
@endphp

<footer class="border-t border-slate-200 bg-white">
    <div class="mx-auto grid max-w-screen-2xl gap-12 px-12 py-20 md:grid-cols-2 xl:grid-cols-6">
        <div class="space-y-6">
            <div>
                <span class="font-headline text-2xl text-slate-950">{{ $brandName }}</span>
                <p class="mt-3 text-sm leading-7 text-slate-600">{{ $footerAbout }}</p>
            </div>
            <a href="{{ $footerCtaUrl }}" class="inline-flex rounded-full bg-primary px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">{{ $footerCtaLabel }}</a>
        </div>
        <div class="flex flex-col gap-4">
            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-primary">{{ $footerCompanyHeading }}</span>
            @include('partials.footer-menu-tree', ['items' => $footerCompanyMenu, 'level' => 0])
        </div>
        <div class="flex flex-col gap-4">
            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-primary">{{ $footerCatalogHeading }}</span>
            @include('partials.footer-menu-tree', ['items' => $footerCatalogMenu, 'level' => 0])
        </div>
        <div class="flex flex-col gap-4">
            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-primary">{{ $footerSupportHeading }}</span>
            @include('partials.footer-menu-tree', ['items' => $footerSupportMenu, 'level' => 0])
        </div>
        <div class="flex flex-col gap-4">
            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-primary">{{ $footerResourcesHeading }}</span>
            @include('partials.footer-menu-tree', ['items' => $footerResourcesMenu, 'level' => 0])
        </div>
        <div class="flex flex-col gap-4">
            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-primary">{{ $footerContactHeading }}</span>
            <p class="text-sm leading-7 text-slate-600">{{ $address }}</p>
            <p class="text-sm text-slate-600">{{ $contactEmail }}</p>
            <p class="text-sm text-slate-600">{{ $contactPhone }}</p>
        </div>
    </div>
    <div class="border-t border-slate-200">
        <div class="mx-auto flex max-w-screen-2xl flex-col items-center justify-between gap-4 px-12 py-8 text-xs uppercase tracking-[0.15em] text-slate-400 md:flex-row">
            <span>{{ $footerBottomText }}</span>
            <span>MOQ minh bach. Bao gia nhanh. Ho tro tai lieu ky thuat.</span>
        </div>
    </div>
</footer>
