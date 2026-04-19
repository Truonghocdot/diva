@extends('layouts.app')

@section('title', $product->name . ' | Diva Materials')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($product->description ?? ''), 155, '...'))
@section('meta_keywords', implode(', ', array_filter([
'nguyen lieu',
$product->name,
$product->sku,
$product->origin,
])))
@section('canonical_url', url('/products/' . $product->slug))
@section('og_type', 'product')
@section('og_image', $product->image)
@section('twitter_card', 'summary_large_image')

@section('structured_data')
@php
$productSchema = [
'@context' => 'https://schema.org',
'@type' => 'Product',
'name' => $product->name,
'description' => strip_tags($product->description ?? ''),
'image' => [$product->image],
'sku' => 'DIVA-' . $product->id,
'brand' => [
'@type' => 'Brand',
'name' => 'Diva Materials',
],
'offers' => [
'@type' => 'Offer',
'url' => url('/products/' . $product->slug),
'priceCurrency' => 'VND',
'price' => (string) ($product->sale_price ?: $product->price),
'priceValidUntil' => now()->addYear()->format('Y-m-d'),
'availability' => $product->stock > 0
? 'https://schema.org/InStock'
: 'https://schema.org/OutOfStock',
'itemCondition' => 'https://schema.org/NewCondition',
],
];
@endphp
<script type="application/ld+json">
    {
        !!json_encode($productSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!
    }
</script>
@endsection

@php
$header_class = 'fixed top-0 z-50 w-full border-b border-white/60 bg-white/85 backdrop-blur-xl';
$galleryImages = $product->gallery_images;
@endphp

@section('content')
<main class="mx-auto max-w-screen-2xl px-8 pb-24 pt-32">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        <div class="lg:col-span-7 space-y-8">
            <div class="group relative aspect-[4/5] overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-xl shadow-slate-200/60">
                <img
                    id="product-main-image"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                    src="{{ $galleryImages[0] ?? $product->image }}"
                    alt="{{ $product->name }}" />
            </div>
            @if(count($galleryImages) > 1)
            <div class="grid grid-cols-4 sm:grid-cols-6 gap-3" id="product-gallery-thumbnails">
                @foreach($galleryImages as $index => $imageUrl)
                <button
                    type="button"
                    class="aspect-square overflow-hidden rounded-2xl border {{ $index === 0 ? 'border-primary' : 'border-slate-200' }} bg-white transition-colors"
                    data-image="{{ $imageUrl }}"
                    aria-label="Ảnh sản phẩm {{ $index + 1 }}">
                    <img src="{{ $imageUrl }}" alt="{{ $product->name }} - {{ $index + 1 }}" class="w-full h-full object-cover" />
                </button>
                @endforeach
            </div>
            @endif
        </div>
        <div class="lg:col-span-5 flex flex-col space-y-10">
            <header class="space-y-4">
                <span class="inline-flex rounded-full border border-blue-200 bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-primary">{{ $product->category?->name ?: 'Nguyen lieu' }}</span>
                <h1 class="text-5xl font-headline font-light tracking-tight text-slate-950">{{ $product->name }}</h1>
                <div class="flex flex-wrap gap-3 text-sm text-slate-500">
                    @if($product->sku)
                        <span class="rounded-full border border-slate-200 px-3 py-1">SKU {{ $product->sku }}</span>
                    @endif
                    @if($product->origin)
                        <span class="rounded-full border border-slate-200 px-3 py-1">Xuat xu {{ $product->origin }}</span>
                    @endif
                </div>
                <p class="text-2xl font-semibold text-primary">{{ number_format($product->price) }} VND @if($product->unit)<span class="text-base font-medium text-slate-500">/ {{ $product->unit }}</span>@endif</p>
                <p class="max-w-2xl text-base leading-8 text-slate-600">{{ $product->short_description ?: $product->description }}</p>
            </header>

            <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-lg shadow-slate-200/60">
                <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Thong tin mua si</h3>
                <div class="mt-6 grid grid-cols-2 gap-4 md:grid-cols-4">
                    <div class="rounded-2xl bg-blue-50 p-4">
                        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">MOQ</span>
                        <span class="mt-2 block text-lg font-semibold text-slate-950">{{ number_format($product->min_order_quantity) }}</span>
                    </div>
                    <div class="rounded-2xl bg-blue-50 p-4">
                        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">Don vi</span>
                        <span class="mt-2 block text-lg font-semibold text-slate-950">{{ $product->unit ?: 'N/A' }}</span>
                    </div>
                    <div class="rounded-2xl bg-blue-50 p-4">
                        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">Quy cach</span>
                        <span class="mt-2 block text-lg font-semibold text-slate-950">{{ $product->pack_size ?: 'Lien he' }}</span>
                    </div>
                    <div class="rounded-2xl bg-blue-50 p-4">
                        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">Lead time</span>
                        <span class="mt-2 block text-lg font-semibold text-slate-950">{{ $product->lead_time_days ? $product->lead_time_days . ' ngay' : 'Xac nhan' }}</span>
                    </div>
                </div>
            </section>

            @if($product->applications)
                <div class="space-y-4 rounded-[2rem] border border-slate-200 bg-white p-8 shadow-lg shadow-slate-200/60">
                    <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Ung dung phu hop</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach($product->applications as $application)
                            <span class="rounded-full border border-slate-200 px-4 py-2 text-sm text-slate-700">{{ $application }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($product->specifications)
                <section class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-lg shadow-slate-200/60">
                    <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Thong so ky thuat</h3>
                    <div class="mt-4 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $product->specifications }}</div>
                </section>
            @endif

            <div class="space-y-4">
                <livewire:add-to-cart-button
                    :product-id="$product->id"
                    label="Them vao don si"
                    :show-quantity-controls="true"
                    button-class="w-full rounded-full bg-primary py-4 font-body font-bold text-white transition-all hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/20"
                    :key="'detail-add-'.$product->id" />
                <a href="{{ url('/checkout') }}" class="inline-flex w-full items-center justify-center rounded-full border border-blue-200 bg-white py-4 text-sm font-semibold text-primary transition hover:bg-blue-50">Di den trang dat mua si</a>
            </div>
        </div>
    </div>

    @if($relatedProducts->count() > 0)
    <section class="mt-48">
        <h2 class="mb-12 text-3xl font-headline font-light text-slate-950">San pham lien quan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $item)
            <div class="group cursor-pointer" onclick="window.location='{{ url('/products/' . $item->slug) }}'">
                <div class="relative mb-6 aspect-[4/5] overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-lg shadow-slate-200/60">
                    <img alt="{{ $item->name }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        src="{{ $item->image }}" />
                </div>
                <h3 class="mb-1 text-lg font-headline font-medium text-slate-950">{{ $item->name }}</h3>
                <p class="font-bold text-primary">{{ number_format($item->price) }}đ</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif
</main>
@endsection

@section('extra_js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mainImage = document.getElementById('product-main-image');
        const thumbnailWrapper = document.getElementById('product-gallery-thumbnails');

        if (!mainImage || !thumbnailWrapper) {
            return;
        }

        thumbnailWrapper.addEventListener('click', function(event) {
            const target = event.target.closest('button[data-image]');

            if (!target) {
                return;
            }

            const nextImage = target.getAttribute('data-image');

            if (!nextImage) {
                return;
            }

            mainImage.setAttribute('src', nextImage);

            thumbnailWrapper.querySelectorAll('button[data-image]').forEach(function(button) {
                button.classList.remove('border-primary');
                button.classList.add('border-outline-variant/30');
            });

            target.classList.remove('border-outline-variant/30');
            target.classList.add('border-primary');
        });
    });
</script>
@endsection
