@extends('layouts.app')

@section('title', 'Diva | Cánh Cửa Bước Vào Thế Giới Hương Thơm')
@section('meta_description', 'Khám phá bộ sưu tập nến thơm thủ công cao cấp với hương thơm tinh tế, thiết kế tối giản và trải nghiệm thư giãn cho không gian sống.')
@section('canonical_url', url('/'))

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen min-h-[800px] flex items-center overflow-hidden">
        @if($banners->count() > 0)
            @php $currentBanner = $banners->first(); @endphp
            <div class="absolute inset-0 z-0">
                <img alt="{{ $currentBanner->title }}" class="w-full h-full object-cover brightness-[0.85] transition-transform duration-[10s] hover:scale-110"
                    src="{{ $currentBanner->image }}" />
                <div class="absolute inset-0 bg-gradient-to-r from-black/40 via-transparent to-transparent"></div>
            </div>
            <div class="relative z-10 max-w-screen-2xl mx-auto px-8 w-full">
                <div class="max-w-3xl space-y-8">
                    <p class="text-on-primary font-label uppercase tracking-[0.2em] text-sm animate-fade-in">
                        {{ $currentBanner->subtitle }}
                    </p>
                    <h1 class="text-7xl md:text-8xl font-headline font-light text-on-primary leading-[1.1] -ml-1">
                        @php
                            $titleParts = explode('<br />', str_replace('<br>', '<br />', $currentBanner->title));
                        @endphp
                        @foreach($titleParts as $part)
                            {!! $part !!}@if(!$loop->last)<br />@endif
                        @endforeach
                    </h1>
                    <div class="flex items-center gap-6 pt-4">
                        <a href="{{ $currentBanner->link ?? url('/shop') }}"
                            class="bg-primary text-on-primary px-10 py-5 rounded-lg text-lg font-medium hover:bg-primary-dim transition-all duration-300 flex items-center gap-3 group">
                            {{ $currentBanner->button_text ?? 'Khám phá ngay' }}
                            <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                        <button class="bg-white/10 backdrop-blur-md border border-white/20 text-on-primary px-10 py-5 rounded-lg text-lg font-medium hover:bg-white/20 transition-all duration-300">
                            Our Story
                        </button>
                    </div>
                </div>
            </div>
        @else
            <!-- Fallback Static Hero -->
            <div class="absolute inset-0 z-0">
                <img alt="Warm aesthetic candle" class="w-full h-full object-cover brightness-[0.85]"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9Q-7mWSkr_UMFReTXhRMxqjsw8MmdHOZhPPfJ03SJzMGajAR9d0OHfQ_VcLLFAXqGozvTx6yhzHovxlLEiV8Rexd1Os8jdRgkTlwcmgU1fBjAnC49wxs4DRvxop2uHRTszHHYG8lpw7rf-cyqAmzZ9trQHHI5WMJmkBrBqmxps_cvVLhEfdybAWxCHFAb9KEOp3QV-NERErsPC0PeNIh07_55xWYi7uhqvYdr4abpLl6mLyUQD1VrxPctVV4LMaw_rq4VAyv0QX8" />
            </div>
            <div class="relative z-10 max-w-screen-2xl mx-auto px-8 w-full">
                <div class="max-w-3xl space-y-8">
                    <p class="text-on-primary font-label uppercase tracking-[0.2em] text-sm animate-fade-in">Bộ Sưu Tập Thu Đông {{ date('Y') }}</p>
                    <h1 class="text-7xl md:text-8xl font-headline font-light text-on-primary leading-[1.1] -ml-1">
                        Cánh Cửa Bước Vào<br />
                        <span class="italic font-normal">Thế Giới Hương Thơm</span>
                    </h1>
                    <div class="flex items-center gap-6 pt-4">
                        <a href="{{ url('/shop') }}"
                            class="bg-primary text-on-primary px-10 py-5 rounded-lg text-lg font-medium hover:bg-primary-dim transition-all duration-300 flex items-center gap-3 group">
                            Khám phá ngay
                            <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2">
            <span class="text-on-primary/60 text-[10px] tracking-widest uppercase">Scroll</span>
            <div class="w-px h-12 bg-gradient-to-b from-white/60 to-transparent"></div>
        </div>
    </section>

    <!-- Featured Categories - Bento Grid -->
    <section class="py-32 px-8 max-w-screen-2xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 h-auto md:h-[700px]">
            @if($categories->count() >= 1)
            @php $cat1 = $categories->get(0); @endphp
            <div
                class="md:col-span-7 relative group overflow-hidden rounded-xl bg-surface-container-low transition-transform duration-700 hover:scale-[0.99] min-h-[400px]">
                <img alt="{{ $cat1->name }}"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                    src="{{ $cat1->image }}" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-12 left-12">
                    <h3 class="text-4xl font-headline text-white mb-4">{{ $cat1->name }}</h3>
                    <p class="text-white/80 max-w-xs mb-6">{{ $cat1->description }}</p>
                    <a class="inline-flex items-center gap-2 text-white font-medium border-b border-white/30 pb-1 hover:border-white transition-all"
                        href="{{ url('/shop?category=' . $cat1->slug) }}">Xem tất cả</a>
                </div>
            </div>
            @endif

            <div class="md:col-span-5 grid grid-rows-2 gap-8">
                @foreach($categories->slice(1, 2) as $category)
                <div
                    class="relative group overflow-hidden rounded-xl bg-surface-container-low transition-transform duration-700 hover:scale-[0.99] min-h-[300px]">
                    <img alt="{{ $category->name }}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        src="{{ $category->image }}" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    <div class="absolute bottom-8 left-8">
                        <h3 class="text-2xl font-headline text-white mb-2">{{ $category->name }}</h3>
                        <a class="inline-flex items-center gap-2 text-white text-sm font-medium border-b border-white/30 pb-1 hover:border-white transition-all"
                            href="{{ url('/shop?category=' . $category->slug) }}">Khám phá</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Bán Chạy Nhất Section -->
    <section class="bg-surface-container-low py-32">
        <div class="max-w-screen-2xl mx-auto px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div class="space-y-4">
                    <span class="text-primary font-label uppercase tracking-widest text-sm">Best Sellers</span>
                    <h2 class="text-5xl font-headline font-light">Bán Chạy Nhất</h2>
                </div>
                <div class="flex items-center gap-4">
                    <button
                        class="w-12 h-12 rounded-full border border-outline-variant/30 flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button
                        class="w-12 h-12 rounded-full border border-outline-variant/30 flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredProducts as $product)
                <!-- Product Card -->
                <div class="group cursor-pointer" onclick="window.location='{{ url('/products/' . $product->slug) }}'">
                    <div class="aspect-[4/5] bg-surface-container-lowest rounded-xl overflow-hidden mb-6 relative">
                        <img alt="{{ $product->name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            src="{{ $product->image }}" />
                        <div
                            class="absolute top-4 right-4 space-y-2 opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0 duration-300">
                            <button
                                class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-on-surface hover:bg-primary hover:text-on-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">favorite</span>
                            </button>
                        </div>
                        @if($product->is_new)
                        <div class="absolute top-4 left-4 bg-primary text-on-primary px-3 py-1 text-[10px] font-bold rounded-full uppercase tracking-wider">New</div>
                        @endif
                    </div>
                    <div class="flex gap-2 mb-3">
                        @if($product->scent_top_notes)
                            @foreach(array_slice($product->scent_top_notes, 0, 2) as $note)
                            <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-[10px] font-label uppercase tracking-wider rounded-full">{{ $note }}</span>
                            @endforeach
                        @endif
                    </div>
                    <h3 class="text-xl font-headline font-medium mb-1">{{ $product->name }}</h3>
                    <p class="text-on-surface-variant font-light mb-4 line-clamp-2">{{ $product->description }}</p>
                    <p class="text-primary font-bold">{{ number_format($product->price) }}đ</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-32 px-8">
        <div class="max-w-screen-xl mx-auto text-center">
            <h2 class="text-4xl font-headline font-light mb-24">Khách hàng nói về chúng tôi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                @foreach($testimonials as $testimonial)
                <!-- Testimonial Item -->
                <div class="space-y-6">
                    <div class="flex justify-center gap-1 text-[#d4af37]">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                    </div>
                    <blockquote class="text-xl font-headline italic leading-relaxed text-on-surface">
                        "{{ $testimonial->content }}"
                    </blockquote>
                    <div class="flex flex-col items-center">
                        <span class="font-bold text-sm tracking-widest uppercase">{{ $testimonial->user_name }}</span>
                        @if($testimonial->location)
                        <span class="text-xs text-on-surface-variant font-light mt-1">{{ $testimonial->location }}</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.newsletter')
@endsection
