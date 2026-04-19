@php
    $limit = max((int) ($data['limit'] ?? 6), 1);
    $source = $data['source'] ?? 'featured';

    $productsQuery = \App\Models\Product::query()->with('category');

    if ($source === 'featured') {
        $productsQuery->where('is_featured', true);
    } elseif ($source === 'latest') {
        $productsQuery->orderByDesc('created_at');
    } else {
        $productsQuery->orderBy('name');
    }

    $products = $productsQuery->limit($limit)->get();
@endphp

<section class="px-8 py-20">
    <div class="mx-auto max-w-screen-2xl">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div class="max-w-3xl">
                <h2 class="font-headline text-5xl leading-none text-primary md:text-6xl">{{ $data['heading'] ?? 'Sản phẩm nổi bật' }}</h2>
                @if(!empty($data['intro']))
                    <p class="mt-4 text-lg leading-8 text-on-surface-variant">{{ $data['intro'] }}</p>
                @endif
            </div>
            <a href="{{ url('/shop') }}" class="inline-flex items-center rounded-full border border-outline-variant bg-white px-6 py-3 text-sm font-semibold uppercase tracking-[0.14em] text-primary transition hover:border-secondary hover:text-secondary">
                Xem toàn bộ sản phẩm
            </a>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($products as $product)
                <article class="overflow-hidden rounded-[2rem] border border-outline-variant bg-white shadow-soft">
                    <a href="{{ url('/products/' . $product->slug) }}" class="block">
                        <div class="aspect-[4/3] overflow-hidden bg-slate-100">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 hover:scale-105">
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-secondary">{{ $product->category?->name }}</p>
                                <a href="{{ url('/products/' . $product->slug) }}" class="mt-2 block text-2xl font-semibold text-primary">{{ $product->name }}</a>
                            </div>
                            <span class="rounded-full bg-secondary-container px-3 py-1 text-sm font-semibold text-primary">{{ number_format($product->price) }}đ</span>
                        </div>
                        <p class="mt-4 line-clamp-3 text-sm leading-7 text-on-surface-variant">{{ $product->short_description ?: $product->description }}</p>
                        <div class="mt-6 flex flex-wrap gap-2 text-xs text-on-surface-variant">
                            @if($product->unit)
                                <span class="rounded-full border border-outline-variant px-3 py-1">Đơn vị: {{ $product->unit }}</span>
                            @endif
                            <span class="rounded-full border border-outline-variant px-3 py-1">MOQ: {{ number_format($product->min_order_quantity) }}</span>
                            @if($product->pack_size)
                                <span class="rounded-full border border-outline-variant px-3 py-1">{{ $product->pack_size }}</span>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
