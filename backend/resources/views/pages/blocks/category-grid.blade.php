@php
    $categories = \App\Models\Category::query()->orderBy('name')->get();
@endphp

<section class="px-8 py-20">
    <div class="mx-auto max-w-screen-2xl">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div class="max-w-3xl">
                <h2 class="font-headline text-5xl leading-none text-primary md:text-6xl">{{ $data['heading'] ?? 'Danh mục nguyên liệu' }}</h2>
                @if(!empty($data['intro']))
                    <p class="mt-4 text-lg leading-8 text-on-surface-variant">{{ $data['intro'] }}</p>
                @endif
            </div>
            <a href="{{ url('/shop') }}" class="inline-flex items-center rounded-full border border-outline-variant bg-white px-6 py-3 text-sm font-semibold uppercase tracking-[0.14em] text-primary transition hover:border-secondary hover:text-secondary">Xem catalog</a>
        </div>
        <div class="mt-10 grid gap-6 lg:grid-cols-12">
            @foreach($categories as $category)
                <a href="{{ url('/shop?category=' . $category->slug) }}" class="group {{ $loop->first ? 'lg:col-span-6' : 'lg:col-span-3' }} overflow-hidden rounded-[2rem] border border-outline-variant bg-white shadow-soft transition hover:-translate-y-1">
                    <div class="aspect-[4/3] overflow-hidden bg-slate-100">
                        <img src="{{ $category->image }}" alt="{{ $category->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.2em] text-secondary">Danh mục {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="mt-3 text-{{ $loop->first ? '4xl' : '2xl' }} font-semibold text-primary">{{ $category->name }}</h3>
                        <p class="mt-3 line-clamp-3 text-sm leading-7 text-on-surface-variant">{{ $category->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
