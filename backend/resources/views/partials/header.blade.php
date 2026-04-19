@php
    $primaryMenuItems = $siteMenus['primary']->items ?? [
        ['label' => 'Nguyên liệu', 'url' => '/shop'],
        ['label' => 'Về chúng tôi', 'url' => '/about'],
        ['label' => 'Bài viết', 'url' => '/blog'],
        ['label' => 'Gửi yêu cầu', 'url' => '/checkout'],
    ];
    $brandName = $siteSettings['site_name'] ?? 'Diva Materials';
    $brandTagline = $siteSettings['site_tagline'] ?? 'Nền tảng nguyên liệu B2B';
    $brandLogo = $siteSettings['logo_url'] ?? null;
    $headerCtaLabel = $siteSettings['header_cta_label'] ?? 'Quản trị nội dung';
    $headerCtaUrl = $siteSettings['header_cta_url'] ?? '/admin';
    $contactEmail = $siteSettings['contact_email'] ?? 'sales@divamaterials.vn';
    $salesPhone = $siteSettings['sales_phone'] ?? ($siteSettings['contact_phone'] ?? '+84 909 888 668');
@endphp

<header class="{{ $header_class ?? 'fixed top-0 z-50 w-full border-b border-white/80 bg-white/90 backdrop-blur-xl' }}">
    <div class="border-b border-outline-variant/70 bg-surface-container-low">
        <div class="mx-auto flex max-w-screen-2xl flex-wrap items-center justify-between gap-3 px-6 py-3 text-[11px] font-medium uppercase tracking-[0.18em] text-on-surface-variant md:px-8">
            <div class="flex flex-wrap items-center gap-3 md:gap-6">
                <span>Tư vấn mua sỉ: {{ $salesPhone }}</span>
                <span class="hidden h-3 w-px bg-outline md:block"></span>
                <span>{{ $contactEmail }}</span>
            </div>
            <span class="hidden md:block">Bố cục phong cách CMS linh hoạt, tối ưu cho catalogue nguyên liệu và báo giá B2B.</span>
        </div>
    </div>

    <nav class="mx-auto max-w-screen-2xl px-6 py-4 md:px-8">
        <div class="flex items-center justify-between gap-6">
            <a class="flex items-center gap-4" href="{{ url('/') }}">
                @if($brandLogo)
                    <img src="{{ $brandLogo }}" alt="{{ $brandName }}" class="h-12 w-12 rounded-[1.25rem] object-cover shadow-soft">
                @endif
                <span class="flex flex-col">
                    <span class="font-headline text-4xl leading-none text-primary">{{ $brandName }}</span>
                    <span class="mt-1 text-[10px] font-semibold uppercase tracking-[0.28em] text-secondary">{{ $brandTagline }}</span>
                </span>
            </a>

            <div class="hidden flex-1 items-center justify-center gap-7 xl:flex">
                @foreach($primaryMenuItems as $item)
                    @php
                        $children = $item['children'] ?? [];
                        $itemUrl = $item['url'] ?? '#';
                        $itemPath = trim(parse_url($itemUrl, PHP_URL_PATH) ?? '', '/');
                        $isExternal = str_starts_with($itemUrl, 'http');
                        $isActive = !$isExternal && $itemPath !== ''
                            ? request()->is($itemPath) || request()->is($itemPath . '/*')
                            : request()->is('/');
                    @endphp
                    <div class="group relative">
                        <a
                            href="{{ $itemUrl }}"
                            @if(!empty($item['open_in_new_tab'])) target="_blank" rel="noreferrer" @endif
                            class="{{ !empty($item['is_highlight']) ? 'rounded-full bg-primary px-5 py-3 text-white shadow-soft hover:bg-primary-dim' : ($isActive ? 'text-primary' : 'text-on-surface hover:text-primary') }} inline-flex items-center gap-2 text-sm font-semibold uppercase tracking-[0.14em] transition"
                        >
                            {{ $item['label'] ?? 'Mục menu' }}
                            @if(!empty($children))
                                <span class="material-symbols-outlined text-base">keyboard_arrow_down</span>
                            @endif
                        </a>

                        @if(!empty($children))
                            <div class="invisible absolute left-1/2 top-full z-30 mt-5 w-[min(880px,80vw)] -translate-x-1/2 opacity-0 transition-all duration-200 group-hover:visible group-hover:opacity-100">
                                <div class="panel-soft rounded-[2rem] p-5">
                                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                                        @include('partials.header-menu-children', [
                                            'items' => $children,
                                            'level' => 0,
                                        ])
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ $headerCtaUrl }}" class="hidden rounded-full border border-outline-variant bg-white px-5 py-3 text-sm font-semibold text-primary transition hover:border-secondary hover:text-secondary lg:inline-flex">
                    {{ $headerCtaLabel }}
                </a>
                <livewire:cart-icon />
                <details class="xl:hidden">
                    <summary class="flex h-12 w-12 cursor-pointer list-none items-center justify-center rounded-full border border-outline-variant bg-white text-primary shadow-sm">
                        <span class="material-symbols-outlined">menu</span>
                    </summary>
                    <div class="absolute left-4 right-4 top-full mt-4 panel-soft rounded-[1.75rem] p-5">
                        <div class="space-y-4">
                            @foreach($primaryMenuItems as $item)
                                @php
                                    $children = $item['children'] ?? [];
                                @endphp
                                <div class="rounded-[1.5rem] border border-outline-variant/80 bg-surface-container-low p-4">
                                    <a href="{{ $item['url'] ?? '#' }}" class="block text-sm font-semibold uppercase tracking-[0.14em] text-primary" @if(!empty($item['open_in_new_tab'])) target="_blank" rel="noreferrer" @endif>
                                        {{ $item['label'] ?? 'Mục menu' }}
                                    </a>
                                    @if(!empty($children))
                                        <div class="mt-3 space-y-2 border-l border-outline-variant pl-4">
                                            @include('partials.header-menu-children', [
                                                'items' => $children,
                                                'level' => 1,
                                            ])
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            <a href="{{ $headerCtaUrl }}" class="inline-flex w-full items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-semibold text-white">
                                {{ $headerCtaLabel }}
                            </a>
                        </div>
                    </div>
                </details>
            </div>
        </div>
    </nav>
</header>
