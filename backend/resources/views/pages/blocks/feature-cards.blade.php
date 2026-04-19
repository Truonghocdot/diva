<section class="px-8 py-20">
    <div class="mx-auto max-w-screen-2xl">
        @if(!empty($data['heading']))
            <h2 class="max-w-3xl font-headline text-5xl leading-none text-primary md:text-6xl">{{ $data['heading'] }}</h2>
        @endif
        @if(!empty($data['intro']))
            <p class="mt-4 max-w-3xl text-lg leading-8 text-on-surface-variant">{{ $data['intro'] }}</p>
        @endif
        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($data['items'] ?? [] as $item)
                <article class="panel-soft rounded-[2rem] p-8">
                    <div class="flex items-center justify-between">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-secondary-container text-primary">
                            <span class="material-symbols-outlined">inventory_2</span>
                        </div>
                        <span class="text-[11px] font-semibold uppercase tracking-[0.22em] text-on-surface-variant">0{{ $loop->iteration }}</span>
                    </div>
                    <h3 class="mt-6 text-3xl font-semibold text-primary">{{ $item['title'] ?? '' }}</h3>
                    <p class="mt-4 text-sm leading-7 text-on-surface-variant">{{ $item['content'] ?? '' }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
