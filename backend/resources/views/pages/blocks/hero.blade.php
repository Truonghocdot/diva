<section class="relative isolate overflow-hidden px-8 pb-24 pt-40">
    <div class="absolute inset-0 grid-pattern opacity-40"></div>
    <div class="absolute inset-x-0 top-0 h-[540px] bg-[radial-gradient(circle_at_top_right,_rgba(26,126,251,0.16),_transparent_36%),linear-gradient(180deg,_#ffffff_0%,_#f4f8fd_100%)]"></div>
    <div class="relative mx-auto grid max-w-screen-2xl items-center gap-12 lg:grid-cols-[1.05fr_0.95fr]">
        <div class="max-w-3xl">
            @if(!empty($data['eyebrow']))
                <span class="inline-flex rounded-full border border-secondary/20 bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.25em] text-secondary">{{ $data['eyebrow'] }}</span>
            @endif
            <h1 class="mt-6 font-headline text-6xl leading-[0.95] text-primary md:text-8xl">{{ $data['title'] ?? '' }}</h1>
            @if(!empty($data['content']))
                <p class="mt-6 max-w-2xl text-lg leading-8 text-on-surface-variant">{{ $data['content'] }}</p>
            @endif
            <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                @if(!empty($data['primary_button_label']) && !empty($data['primary_button_url']))
                    <a href="{{ $data['primary_button_url'] }}" class="inline-flex items-center justify-center rounded-full bg-primary px-7 py-4 text-sm font-semibold uppercase tracking-[0.14em] text-white shadow-soft transition hover:bg-primary-dim">
                        {{ $data['primary_button_label'] }}
                    </a>
                @endif
                @if(!empty($data['secondary_button_label']) && !empty($data['secondary_button_url']))
                    <a href="{{ $data['secondary_button_url'] }}" class="inline-flex items-center justify-center rounded-full border border-outline-variant bg-white px-7 py-4 text-sm font-semibold uppercase tracking-[0.14em] text-primary transition hover:border-secondary hover:text-secondary">
                        {{ $data['secondary_button_label'] }}
                    </a>
                @endif
            </div>
            <div class="mt-12 grid gap-4 sm:grid-cols-3">
                <div class="panel-soft rounded-[1.5rem] px-5 py-4">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Danh mục cốt lõi</p>
                    <p class="mt-2 text-sm font-semibold text-primary">Sáp, hương liệu, bao bì, bấc và dụng cụ.</p>
                </div>
                <div class="panel-soft rounded-[1.5rem] px-5 py-4">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Dành cho B2B</p>
                    <p class="mt-2 text-sm font-semibold text-primary">MOQ rõ ràng, tài liệu kỹ thuật và lead time minh bạch.</p>
                </div>
                <div class="panel-soft rounded-[1.5rem] px-5 py-4">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Quản trị mạnh</p>
                    <p class="mt-2 text-sm font-semibold text-primary">Sửa từng trang, preview, draft và revision ngay trong CMS.</p>
                </div>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -left-10 top-10 h-40 w-40 rounded-full bg-secondary/10 blur-3xl"></div>
            <div class="absolute -right-6 bottom-10 h-48 w-48 rounded-full bg-primary/10 blur-3xl"></div>
            <div class="panel-soft relative overflow-hidden rounded-[2rem] p-3">
                <img src="{{ $data['image'] ?: 'https://images.unsplash.com/photo-1581093458791-9d15482442f6?q=80&w=1400&auto=format&fit=crop' }}" alt="{{ $data['title'] ?? 'Diva Materials' }}" class="aspect-[4/5] w-full rounded-[1.5rem] object-cover">
                <div class="absolute bottom-8 left-8 max-w-xs rounded-[1.5rem] border border-white/70 bg-white/90 px-5 py-4 backdrop-blur">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Bố cục lấy cảm hứng từ Catchers</p>
                    <p class="mt-2 text-sm leading-6 text-primary">Nhịp section sáng, typography sang hơn và cảm giác catalogue doanh nghiệp rõ ràng hơn.</p>
                </div>
            </div>
        </div>
    </div>
</section>
