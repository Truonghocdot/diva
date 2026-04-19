<section class="px-8 py-8">
    <div class="panel-tint mx-auto max-w-screen-2xl rounded-[2rem] p-8 md:p-12">
        @if(!empty($data['heading']))
            <h2 class="font-headline text-5xl leading-none text-primary md:text-6xl">{{ $data['heading'] }}</h2>
        @endif
        <div class="mt-8 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            @foreach($data['items'] ?? [] as $item)
                <article class="rounded-[1.5rem] border border-outline-variant bg-white p-6 shadow-soft">
                    <div class="text-4xl font-semibold text-secondary">{{ $item['value'] ?? '' }}</div>
                    <div class="mt-2 text-sm font-semibold uppercase tracking-[0.2em] text-primary">{{ $item['label'] ?? '' }}</div>
                    @if(!empty($item['description']))
                        <p class="mt-4 text-sm leading-7 text-on-surface-variant">{{ $item['description'] }}</p>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>
