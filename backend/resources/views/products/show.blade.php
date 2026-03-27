@extends('layouts.app')

@section('title', $product->name . ' | The Tactile Sanctuary')

@php
    $header_class = 'fixed top-0 w-full z-50 bg-[#f8faf9]/60 backdrop-blur-md';
@endphp

@section('content')
<main class="pt-32 pb-24 px-8 max-w-screen-2xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        <!-- Left: Gallery Section -->
        <div class="lg:col-span-7 space-y-8">
            <div class="relative aspect-[4/5] rounded-xl overflow-hidden bg-surface-container-low group">
                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $product->image }}"/>
            </div>
            <!-- Thumbnails ... -->
        </div>
        <!-- Right: Product Info Section -->
        <div class="lg:col-span-5 flex flex-col space-y-10">
            <header class="space-y-4">
                <h1 class="text-5xl font-headline font-light tracking-tight text-on-surface italic">{{ $product->name }}</h1>
                <p class="text-2xl font-light text-primary">{{ number_format($product->price) }} VND</p>
            </header>
            
            <section class="p-8 bg-surface-container-low rounded-xl space-y-6">
                <h3 class="text-xs font-label uppercase tracking-[0.2em] text-on-surface-variant">Scent Profile</h3>
                <div class="space-y-4">
                    @if($product->scent_top_notes)
                    <div class="flex items-start gap-4">
                        <span class="text-[10px] font-label uppercase tracking-widest text-primary mt-1 w-20">Top</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->scent_top_notes as $note)
                            <span class="px-3 py-1 bg-white text-on-surface text-[10px] rounded-full ghost-border">{{ $note }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($product->scent_middle_notes)
                    <div class="flex items-start gap-4">
                        <span class="text-[10px] font-label uppercase tracking-widest text-primary mt-1 w-20">Middle</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->scent_middle_notes as $note)
                            <span class="px-3 py-1 bg-white text-on-surface text-[10px] rounded-full ghost-border">{{ $note }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($product->scent_base_notes)
                    <div class="flex items-start gap-4">
                        <span class="text-[10px] font-label uppercase tracking-widest text-primary mt-1 w-20">Base</span>
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
                    <span class="text-[10px] font-label uppercase tracking-widest text-on-surface-variant block mb-1">Wax</span>
                    <span class="text-sm font-medium">{{ $product->wax_type }}</span>
                </div>
                <div class="text-center">
                    <span class="text-[10px] font-label uppercase tracking-widest text-on-surface-variant block mb-1">Burn Time</span>
                    <span class="text-sm font-medium">{{ $product->burn_time }}</span>
                </div>
                <div class="text-center">
                    <span class="text-[10px] font-label uppercase tracking-widest text-on-surface-variant block mb-1">Weight</span>
                    <span class="text-sm font-medium">{{ $product->weight }}</span>
                </div>
            </div>

            <div class="space-y-4">
                <button class="w-full py-4 bg-primary text-on-primary font-body font-bold rounded-lg hover:shadow-lg transition-all">
                    Add to Bag
                </button>
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
