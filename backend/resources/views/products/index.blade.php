@extends('layouts.app')

@section('title', 'Diva | Curated Collections')
@section('meta_description', 'Mua nến thơm, starter kits và candle supplies với nhiều nhóm mùi hương được tuyển chọn thủ công.')
@section('canonical_url', request('category') ? url('/shop?category=' . request('category')) : url('/shop'))

@php
$header_class = 'fixed top-0 w-full z-50 glass-nav';
@endphp

@section('content')
<main class="pt-32 pb-24 max-w-screen-2xl mx-auto px-8 lg:px-12">
    <!-- Header & Sort -->
    <header class="mb-16 flex flex-col md:flex-row md:items-end justify-between gap-8">
        <div class="max-w-2xl">
            <h1 class="text-5xl lg:text-6xl font-headline font-light tracking-tight mb-4 leading-tight">Artisan Vessels & <br /><span class="italic text-primary">Ephemeral Scents</span></h1>
            <p class="text-on-surface-variant leading-relaxed max-w-lg">Discover our curated collection of hand-poured vessels and refined fragrance oils, designed to transform your space into a sensory refuge.</p>
        </div>
        <div class="flex items-center gap-4">
            <span class="font-label text-xs uppercase tracking-[0.15em] text-outline">Sort by:</span>
            <select class="bg-transparent border-none focus:ring-0 font-body text-sm text-primary font-medium cursor-pointer py-1 pl-0 pr-8">
                <option>Most Popular</option>
                <option>Newest</option>
                <option>Price Low to High</option>
                <option>Price High to Low</option>
            </select>
        </div>
    </header>

    <div class="flex flex-col lg:flex-row gap-16">
        <!-- Sidebar Filters -->
        <aside class="w-full lg:w-64 flex-shrink-0 space-y-12">
            <section>
                <h3 class="font-label text-xs uppercase tracking-[0.2em] text-on-surface mb-6 font-bold">Scent Family</h3>
                <div class="space-y-3">
                    @foreach($categories as $category)
                    <label class="flex items-center group cursor-pointer">
                        <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20 bg-transparent transition-all" type="checkbox" {{ request('category') == $category->slug ? 'checked' : '' }} onclick="window.location='{{ url('/shop?category=' . $category->slug) }}'" />
                        <span class="ml-3 text-sm {{ request('category') == $category->slug ? 'text-primary font-medium' : 'text-on-surface-variant group-hover:text-primary transition-colors' }}">{{ $category->name }}</span>
                    </label>
                    @endforeach
                </div>
            </section>
            <!-- ... other filters ... -->
        </aside>

        <!-- Product Grid -->
        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-16">
            @foreach($products as $product)
            <!-- Card -->
            <div class="group cursor-pointer" onclick="window.location='{{ url('/products/' . $product->slug) }}'">
                <div class="relative aspect-[4/5] bg-surface-container-low overflow-hidden rounded-xl mb-6">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $product->image }}" />
                    <livewire:add-to-cart-button
                        :product-id="$product->id"
                        label="Add to Cart"
                        button-class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-md py-4 rounded-lg opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 font-label text-xs uppercase tracking-widest text-on-surface flex items-center justify-center gap-2"
                        :key="'shop-add-'.$product->id" />
                </div>
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-headline text-xl text-on-surface">{{ $product->name }}</h3>
                    <span class="font-body text-sm font-bold text-primary">{{ number_format($product->price) }}đ</span>
                </div>
                <p class="text-sm text-on-surface-variant mb-4 leading-relaxed line-clamp-2">{{ $product->description }}</p>
                <div class="flex gap-2">
                    @if($product->category)
                    <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-[10px] font-label uppercase tracking-wider rounded-full">{{ $product->category->name }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection