<section class="px-8 py-20">
    <div class="mx-auto max-w-screen-2xl overflow-hidden rounded-[2.5rem] bg-[linear-gradient(135deg,_#13213f_0%,_#213868_50%,_#1a7efb_100%)] p-10 text-white shadow-panel md:p-16">
        <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div class="max-w-3xl">
                <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-white/80">Liên hệ mua sỉ</span>
                <h2 class="mt-5 font-headline text-5xl leading-none md:text-6xl">{{ $data['heading'] ?? '' }}</h2>
                @if(!empty($data['content']))
                    <p class="mt-6 text-lg leading-8 text-blue-50">{{ $data['content'] }}</p>
                @endif
                @if(!empty($data['button_label']) && !empty($data['button_url']))
                    <a href="{{ $data['button_url'] }}" class="mt-8 inline-flex items-center rounded-full bg-white px-7 py-4 text-sm font-semibold uppercase tracking-[0.14em] text-primary transition hover:bg-blue-50">
                        {{ $data['button_label'] }}
                    </a>
                @endif
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-[1.5rem] border border-white/15 bg-white/10 px-6 py-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-white/70">Quy trình</p>
                    <p class="mt-2 text-sm leading-7 text-white">Gửi yêu cầu, xác nhận quy cách, nhận báo giá và lịch giao theo lô.</p>
                </div>
                <div class="rounded-[1.5rem] border border-white/15 bg-white/10 px-6 py-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-white/70">Phù hợp</p>
                    <p class="mt-2 text-sm leading-7 text-white">Workshop, đội R&D, nhà máy vừa và nhỏ, doanh nghiệp thương mại.</p>
                </div>
            </div>
        </div>
    </div>
</section>
