@extends('layouts.app')

@section('title', $product->name . ' | Diva')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($product->description ?? ''), 155, '...'))
@section('meta_keywords', implode(', ', array_filter([
'nến thơm',
$product->name,
$product->wax_type,
is_array($product->scent_top_notes) ? implode(', ', $product->scent_top_notes) : null,
is_array($product->scent_middle_notes) ? implode(', ', $product->scent_middle_notes) : null,
is_array($product->scent_base_notes) ? implode(', ', $product->scent_base_notes) : null,
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
'name' => 'Diva',
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
$header_class = 'fixed top-0 w-full z-50 bg-[#f8faf9]/60 backdrop-blur-md';
$galleryImages = $product->gallery_images;
@endphp

@section('content')
<main class="pt-32 pb-24 px-8 max-w-screen-2xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        <!-- Left: Gallery Section -->
        <div class="lg:col-span-7 space-y-8">
            <div class="relative aspect-[4/5] rounded-xl overflow-hidden bg-surface-container-low group">
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
                    class="aspect-square rounded-lg overflow-hidden border {{ $index === 0 ? 'border-primary' : 'border-outline-variant/30' }} transition-colors"
                    data-image="{{ $imageUrl }}"
                    aria-label="Ảnh sản phẩm {{ $index + 1 }}">
                    <img src="{{ $imageUrl }}" alt="{{ $product->name }} - {{ $index + 1 }}" class="w-full h-full object-cover" />
                </button>
                @endforeach
            </div>
            @endif
        </div>
        <!-- Right: Product Info Section -->
        <div class="lg:col-span-5 flex flex-col space-y-10">
            <header class="space-y-4">
                <h1 class="text-5xl font-headline font-light tracking-tight text-on-surface italic">{{ $product->name }}</h1>
                <p class="text-2xl font-light text-primary">{{ number_format($product->price) }} VND</p>
            </header>

            <section class="p-8 bg-surface-container-low rounded-xl space-y-6">
                <h3 class="text-xs font-label uppercase tracking-[0.2em] text-on-surface-variant">Tầng hương</h3>
                <div class="space-y-4">
                    @if($product->scent_top_notes)
                    <div class="flex items-start gap-4">
                        <span class="text-[10px] font-label uppercase tracking-widest text-primary mt-1 w-20">Hương đầu</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->scent_top_notes as $note)
                            <span class="px-3 py-1 bg-white text-on-surface text-[10px] rounded-full ghost-border">{{ $note }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($product->scent_middle_notes)
                    <div class="flex items-start gap-4">
                        <span class="text-[10px] font-label uppercase tracking-widest text-primary mt-1 w-20">Hương giữa</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->scent_middle_notes as $note)
                            <span class="px-3 py-1 bg-white text-on-surface text-[10px] rounded-full ghost-border">{{ $note }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($product->scent_base_notes)
                    <div class="flex items-start gap-4">
                        <span class="text-[10px] font-label uppercase tracking-widest text-primary mt-1 w-20">Hương cuối</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->scent_base_notes as $note)
                            <span class="px-3 py-1 bg-white text-on-surface text-[10px] rounded-full ghost-border">{{ $note }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </section>

            <div class="grid grid-cols-3 gap-8 py-8 border-y border-outline-variant/10">
                <div class="text-center">
                    <span class="text-[10px] font-label uppercase tracking-widest text-on-surface-variant block mb-1">Loại sáp</span>
                    <span class="text-sm font-medium">{{ $product->wax_type }}</span>
                </div>
                <div class="text-center">
                    <span class="text-[10px] font-label uppercase tracking-widest text-on-surface-variant block mb-1">Thời gian cháy</span>
                    <span class="text-sm font-medium">{{ $product->burn_time }}</span>
                </div>
                <div class="text-center">
                    <span class="text-[10px] font-label uppercase tracking-widest text-on-surface-variant block mb-1">Khối lượng</span>
                    <span class="text-sm font-medium">{{ $product->weight }}</span>
                </div>
            </div>

            <div class="space-y-4">
                <livewire:add-to-cart-button
                    :product-id="$product->id"
                    label="Thêm vào giỏ"
                    :show-quantity-controls="true"
                    button-class="w-full py-4 bg-primary text-on-primary font-body font-bold rounded-lg hover:shadow-lg transition-all"
                    :key="'detail-add-'.$product->id" />
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <section class="mt-48">
        <h2 class="text-3xl font-headline font-light mb-12">Sản phẩm liên quan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $item)
            <div class="group cursor-pointer" onclick="window.location='{{ url('/products/' . $item->slug) }}'">
                <div class="aspect-[4/5] bg-surface-container-low rounded-xl overflow-hidden mb-6 relative">
                    <img alt="{{ $item->name }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        src="{{ $item->image }}" />
                </div>
                <h3 class="text-lg font-headline font-medium mb-1">{{ $item->name }}</h3>
                <p class="text-primary font-bold">{{ number_format($item->price) }}đ</p>
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
