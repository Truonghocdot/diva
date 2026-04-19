@php
    $primaryMenuItems = $siteMenus['primary']->items ?? [
        ['label' => 'Catalog', 'url' => '/shop'],
        ['label' => 'Ve chung toi', 'url' => '/about'],
        ['label' => 'Tin tuc', 'url' => '/blog'],
        ['label' => 'Dat mua si', 'url' => '/checkout'],
    ];
    $brandName = $siteSettings['site_name'] ?? 'Diva Materials';
    $brandTagline = $siteSettings['site_tagline'] ?? 'B2B Supply Hub';
    $brandLogo = $siteSettings['logo_url'] ?? null;
    $headerCtaLabel = $siteSettings['header_cta_label'] ?? 'Quan tri noi dung';
    $headerCtaUrl = $siteSettings['header_cta_url'] ?? '/admin';
@endphp

<nav class="{{ $header_class ?? 'fixed top-0 z-50 w-full border-b border-white/60 bg-white/85 backdrop-blur-xl' }}">
    <div class="mx-auto flex max-w-screen-2xl items-center justify-between px-8 py-5">
        <div class="flex items-center gap-12">
            <a class="flex items-center gap-3" href="{{ url('/') }}">
                @if($brandLogo)
                    <img src="{{ $brandLogo }}" alt="{{ $brandName }}" class="h-11 w-11 rounded-2xl object-cover shadow-sm">
                @endif
                <span class="flex flex-col">
                    <span class="font-headline text-2xl text-slate-950">{{ $brandName }}</span>
                    <span class="text-[10px] font-semibold uppercase tracking-[0.25em] text-primary">{{ $brandTagline }}</span>
                </span>
            </a>
            <div class="hidden items-center gap-8 md:flex">
                @foreach($primaryMenuItems as $item)
                    @php
                        $children = $item['children'] ?? [];
                        $itemUrl = $item['url'] ?? '#';
                        $isExternal = str_starts_with($itemUrl, 'http');
                        $isActive = !$isExternal && ltrim(parse_url($itemUrl, PHP_URL_PATH) ?? '', '/') !== ''
                            ? request()->is(ltrim(parse_url($itemUrl, PHP_URL_PATH) ?? '', '/').'*')
                            : false;
                    @endphp
                    <div class="relative group">
                        <a
                            href="{{ $itemUrl }}"
                            @if(!empty($item['open_in_new_tab'])) target="_blank" rel="noreferrer" @endif
                            class="{{ $isActive ? 'text-primary' : 'text-slate-600 hover:text-primary' }} {{ !empty($item['is_highlight']) ? 'rounded-full border border-blue-200 bg-blue-50 px-4 py-2' : '' }} text-sm font-medium transition-colors"
                        >
                            {{ $item['label'] ?? 'Menu item' }}
                        </a>

                        @if(!empty($children))
                            <div class="invisible absolute left-0 top-full z-20 mt-4 min-w-[220px] rounded-2xl border border-slate-200 bg-white p-3 opacity-0 shadow-xl shadow-slate-200/80 transition-all duration-200 group-hover:visible group-hover:opacity-100">
                                @include('partials.header-menu-children', [
                                    'items' => $children,
                                    'level' => 0,
                                ])
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ $headerCtaUrl }}" class="hidden rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-blue-200 hover:text-primary lg:inline-flex">
                {{ $headerCtaLabel }}
            </a>
            <livewire:cart-icon />
        </div>
    </div>
</nav>
