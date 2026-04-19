<section class="px-8 py-8">
    <div class="mx-auto max-w-screen-2xl rounded-[2rem] border border-slate-200 bg-white p-8 shadow-lg shadow-slate-200/60 md:p-12">
        @if(!empty($data['heading']))
            <h2 class="font-headline text-3xl text-slate-950 md:text-4xl">{{ $data['heading'] }}</h2>
        @endif
        <div class="mt-8 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            @foreach($data['items'] ?? [] as $item)
                <article class="rounded-[1.5rem] border border-blue-100 bg-blue-50/60 p-6">
                    <div class="text-3xl font-semibold text-primary">{{ $item['value'] ?? '' }}</div>
                    <div class="mt-2 text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $item['label'] ?? '' }}</div>
                    @if(!empty($item['description']))
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ $item['description'] }}</p>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>
