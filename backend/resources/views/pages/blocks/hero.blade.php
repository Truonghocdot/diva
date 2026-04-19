<section class="relative isolate overflow-hidden bg-[radial-gradient(circle_at_top_left,_rgba(59,130,246,0.16),_transparent_38%),linear-gradient(180deg,_#f8fbff_0%,_#ffffff_100%)] px-8 pb-24 pt-40">
    <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(148,163,184,0.08)_1px,transparent_1px),linear-gradient(rgba(148,163,184,0.08)_1px,transparent_1px)] bg-[size:48px_48px] opacity-40"></div>
    <div class="relative mx-auto grid max-w-screen-2xl items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="max-w-3xl">
            @if(!empty($data['eyebrow']))
                <span class="inline-flex rounded-full border border-blue-200 bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.25em] text-primary">{{ $data['eyebrow'] }}</span>
            @endif
            <h1 class="mt-6 font-headline text-5xl leading-tight text-slate-950 md:text-7xl">{{ $data['title'] ?? '' }}</h1>
            @if(!empty($data['content']))
                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">{{ $data['content'] }}</p>
            @endif
            <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                @if(!empty($data['primary_button_label']) && !empty($data['primary_button_url']))
                    <a href="{{ $data['primary_button_url'] }}" class="inline-flex items-center justify-center rounded-full bg-primary px-7 py-4 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-700">
                        {{ $data['primary_button_label'] }}
                    </a>
                @endif
                @if(!empty($data['secondary_button_label']) && !empty($data['secondary_button_url']))
                    <a href="{{ $data['secondary_button_url'] }}" class="inline-flex items-center justify-center rounded-full border border-blue-200 bg-white px-7 py-4 text-sm font-semibold text-primary transition hover:border-blue-300 hover:bg-blue-50">
                        {{ $data['secondary_button_label'] }}
                    </a>
                @endif
            </div>
        </div>
        <div class="relative">
            <div class="absolute -left-8 top-10 h-40 w-40 rounded-full bg-blue-200/50 blur-3xl"></div>
            <div class="relative overflow-hidden rounded-[2rem] border border-white/70 bg-white p-3 shadow-2xl shadow-blue-100/70">
                <img src="{{ $data['image'] ?: 'https://images.unsplash.com/photo-1581093458791-9d15482442f6?q=80&w=1400&auto=format&fit=crop' }}" alt="{{ $data['title'] ?? 'Diva Materials' }}" class="aspect-[4/5] w-full rounded-[1.5rem] object-cover">
            </div>
        </div>
    </div>
</section>
