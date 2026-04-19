<section class="px-8 py-20">
    <div class="mx-auto max-w-screen-2xl">
        @if(!empty($data['heading']))
            <h2 class="max-w-3xl font-headline text-4xl text-slate-950 md:text-5xl">{{ $data['heading'] }}</h2>
        @endif
        @if(!empty($data['intro']))
            <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">{{ $data['intro'] }}</p>
        @endif
        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($data['items'] ?? [] as $item)
                <article class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-lg shadow-slate-200/60">
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 text-primary">
                        <span class="material-symbols-outlined">inventory_2</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-semibold text-slate-950">{{ $item['title'] ?? '' }}</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">{{ $item['content'] ?? '' }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
