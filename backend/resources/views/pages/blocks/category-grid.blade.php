@php
    $categories = \App\Models\Category::query()->orderBy('name')->get();
@endphp

<section class="px-8 py-20">
    <div class="mx-auto max-w-screen-2xl">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div class="max-w-3xl">
                <h2 class="font-headline text-4xl text-slate-950 md:text-5xl">{{ $data['heading'] ?? 'Danh muc nguyen lieu' }}</h2>
                @if(!empty($data['intro']))
                    <p class="mt-4 text-lg leading-8 text-slate-600">{{ $data['intro'] }}</p>
                @endif
            </div>
            <a href="{{ url('/shop') }}" class="inline-flex items-center text-sm font-semibold text-primary">Xem catalog</a>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach($categories as $category)
                <a href="{{ url('/shop?category=' . $category->slug) }}" class="group overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-lg shadow-slate-200/60 transition hover:-translate-y-1">
                    <div class="aspect-[4/3] overflow-hidden bg-slate-100">
                        <img src="{{ $category->image }}" alt="{{ $category->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-slate-950">{{ $category->name }}</h3>
                        <p class="mt-3 line-clamp-3 text-sm leading-7 text-slate-600">{{ $category->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
