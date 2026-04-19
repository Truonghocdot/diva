@extends('layouts.app')

@section('title', $product->name . ' | Diva Materials')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($product->description ?? ''), 155, '...'))
@section('meta_keywords', implode(', ', array_filter([
'nguyên liệu',
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
    <div class="grid grid-cols-1 gap-16 lg:grid-cols-12">
        <div class="space-y-8 lg:col-span-7">
            <div class="group relative aspect-[4/5] overflow-hidden rounded-[2rem] border border-outline-variant bg-white shadow-panel">
                <img
                    id="product-main-image"
                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                    src="{{ $galleryImages[0] ?? $product->image }}"
                    alt="{{ $product->name }}" />
            </div>
            @if(count($galleryImages) > 1)
            <div class="grid grid-cols-4 gap-3 sm:grid-cols-6" id="product-gallery-thumbnails">
                @foreach($galleryImages as $index => $imageUrl)
                <button
                    type="button"
                    class="aspect-square overflow-hidden rounded-2xl border {{ $index === 0 ? 'border-primary' : 'border-outline-variant' }} bg-white transition-colors"
                    data-image="{{ $imageUrl }}"
                    aria-label="Ảnh sản phẩm {{ $index + 1 }}">
                    <img src="{{ $imageUrl }}" alt="{{ $product->name }} - {{ $index + 1 }}" class="h-full w-full object-cover" />
                </button>
                @endforeach
            </div>
            @endif
        </div>
        <div class="flex flex-col space-y-10 lg:col-span-5">
            <header class="space-y-4">
                <span class="inline-flex rounded-full border border-secondary/20 bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-secondary">{{ $product->category?->name ?: 'Nguyên liệu' }}</span>
                <h1 class="text-6xl font-headline font-light tracking-tight text-primary">{{ $product->name }}</h1>
                <div class="flex flex-wrap gap-3 text-sm text-on-surface-variant">
                    @if($product->sku)
                        <span class="rounded-full border border-outline-variant px-3 py-1">SKU {{ $product->sku }}</span>
                    @endif
                    @if($product->origin)
                        <span class="rounded-full border border-outline-variant px-3 py-1">Xuất xứ {{ $product->origin }}</span>
                    @endif
                </div>
                <p class="text-2xl font-semibold text-secondary">{{ number_format($product->price) }} VND @if($product->unit)<span class="text-base font-medium text-on-surface-variant">/ {{ $product->unit }}</span>@endif</p>
                <p class="max-w-2xl text-base leading-8 text-on-surface-variant">{{ $product->short_description ?: $product->description }}</p>
            </header>

            <section class="panel-soft rounded-[2rem] p-8">
                <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-secondary">Thông tin mua sỉ</h3>
                <div class="mt-6 grid grid-cols-2 gap-4 md:grid-cols-4">
                    <div class="rounded-2xl bg-surface-container p-4">
                        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-on-surface-variant">MOQ</span>
                        <span class="mt-2 block text-lg font-semibold text-primary">{{ number_format($product->min_order_quantity) }}</span>
                    </div>
                    <div class="rounded-2xl bg-surface-container p-4">
                        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-on-surface-variant">Đơn vị</span>
                        <span class="mt-2 block text-lg font-semibold text-primary">{{ $product->unit ?: 'N/A' }}</span>
                    </div>
                    <div class="rounded-2xl bg-surface-container p-4">
                        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-on-surface-variant">Quy cách</span>
                        <span class="mt-2 block text-lg font-semibold text-primary">{{ $product->pack_size ?: 'Liên hệ' }}</span>
                    </div>
                    <div class="rounded-2xl bg-surface-container p-4">
                        <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-on-surface-variant">Lead time</span>
                        <span class="mt-2 block text-lg font-semibold text-primary">{{ $product->lead_time_days ? $product->lead_time_days . ' ngày' : 'Xác nhận' }}</span>
                    </div>
                </div>
            </section>

            @if($product->applications)
                <div class="space-y-4 rounded-[2rem] border border-outline-variant bg-white p-8 shadow-soft">
                    <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-secondary">Ứng dụng phù hợp</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach($product->applications as $application)
                            <span class="rounded-full border border-outline-variant px-4 py-2 text-sm text-on-surface">{{ $application }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($product->specifications)
                <section class="rounded-[2rem] border border-outline-variant bg-white p-8 shadow-soft">
                    <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-secondary">Thông số kỹ thuật</h3>
                    <div class="mt-4 whitespace-pre-line text-sm leading-7 text-on-surface-variant">{{ $product->specifications }}</div>
                </section>
            @endif

            <div class="space-y-4">
                <livewire:add-to-cart-button
                    :product-id="$product->id"
                    label="Thêm vào đơn sỉ"
                    :show-quantity-controls="true"
                    button-class="w-full rounded-full bg-primary py-4 font-body font-bold uppercase tracking-[0.14em] text-white transition-all hover:bg-primary-dim hover:shadow-lg hover:shadow-primary/20"
                    :key="'detail-add-'.$product->id" />
                <a href="{{ url('/checkout') }}" class="inline-flex w-full items-center justify-center rounded-full border border-outline-variant bg-white py-4 text-sm font-semibold uppercase tracking-[0.14em] text-primary transition hover:border-secondary hover:text-secondary">Đi đến trang đặt mua sỉ</a>
            </div>
        </div>
    </div>

    @if($relatedProducts->count() > 0)
    <section class="mt-48">
        <h2 class="mb-12 text-5xl font-headline font-light text-primary">Sản phẩm liên quan</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($relatedProducts as $item)
            <div class="group cursor-pointer" onclick="window.location='{{ url('/products/' . $item->slug) }}'">
                <div class="relative mb-6 aspect-[4/5] overflow-hidden rounded-[2rem] border border-outline-variant bg-white shadow-soft">
                    <img alt="{{ $item->name }}"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        src="{{ $item->image }}" />
                </div>
                <h3 class="mb-1 text-xl font-headline font-medium text-primary">{{ $item->name }}</h3>
                <p class="font-bold text-secondary">{{ number_format($item->price) }}đ</p>
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
                button.classList.add('border-outline-variant');
            });

            target.classList.remove('border-outline-variant');
            target.classList.add('border-primary');
        });
    });
</script>
@endsection
