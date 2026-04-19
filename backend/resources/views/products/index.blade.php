@extends('layouts.app')

@section('title', 'Catalog nguyên liệu | Diva Materials')
@section('meta_description', 'Catalog mua sỉ nguyên liệu, hương liệu, bao bì và phụ liệu cho doanh nghiệp sản xuất và workshop.')
@section('canonical_url', request('category') ? url('/shop?category=' . request('category')) : url('/shop'))

@php
$header_class = 'fixed top-0 w-full z-50 glass-nav';
@endphp

@section('content')
<main class="mx-auto max-w-screen-2xl px-8 pb-24 pt-32 lg:px-12">
    <header class="mb-16 panel-tint rounded-[2.5rem] px-8 py-10">
        <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:items-end">
            <div class="max-w-3xl">
                <span class="inline-flex rounded-full border border-secondary/20 bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-secondary">Catalog mua sỉ</span>
                <h1 class="mt-5 font-headline text-6xl leading-[0.95] text-primary lg:text-7xl">Nguyên liệu và phụ liệu dành cho đơn hàng số lượng lớn</h1>
                <p class="mt-4 max-w-2xl leading-8 text-on-surface-variant">Chọn nhanh theo danh mục, MOQ và quy cách đóng gói để lập đơn mua sỉ cho workshop, nhà máy và đội thương mại.</p>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-[1.5rem] border border-outline-variant bg-white px-5 py-4">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Tư duy catalogue</p>
                    <p class="mt-2 text-sm text-primary">Trình bày kiểu doanh nghiệp, nhấn mạnh cấu trúc và tính dễ tra cứu.</p>
                </div>
                <div class="rounded-[1.5rem] border border-outline-variant bg-white px-5 py-4">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Dữ liệu mua hàng</p>
                    <p class="mt-2 text-sm text-primary">MOQ, đơn vị tính, quy cách và lead time rõ ngay từ danh sách.</p>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-col gap-16 lg:flex-row">
        <aside class="w-full flex-shrink-0 space-y-12 lg:w-64">
            <section class="panel-soft rounded-[2rem] p-6">
                <h3 class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-secondary">Danh mục nguyên liệu</h3>
                <div class="space-y-3">
                    <a href="{{ url('/shop') }}" class="block rounded-full px-4 py-2 text-sm {{ request('category') ? 'text-on-surface-variant hover:text-primary' : 'bg-secondary-container font-semibold text-primary' }}">Tất cả</a>
                    @foreach($categories as $category)
                        <a href="{{ url('/shop?category=' . $category->slug) }}" class="block rounded-full px-4 py-2 text-sm {{ request('category') == $category->slug ? 'bg-secondary-container font-semibold text-primary' : 'text-on-surface-variant hover:text-primary' }}">{{ $category->name }}</a>
                    @endforeach
                </div>
                <div class="mt-8 rounded-[1.5rem] bg-surface-container px-5 py-4">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Gợi ý sử dụng</p>
                    <p class="mt-2 text-sm leading-7 text-primary">Lọc theo nhóm nguyên liệu để đội mua hàng gửi yêu cầu báo giá nhanh hơn.</p>
                </div>
            </section>
        </aside>

        <div class="grid flex-1 grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 xl:grid-cols-3">
            @foreach($products as $product)
            <div class="group cursor-pointer" onclick="window.location='{{ url('/products/' . $product->slug) }}'">
                <div class="relative mb-6 aspect-[4/5] overflow-hidden rounded-[2rem] border border-outline-variant bg-white shadow-soft">
                    <img class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $product->image }}" />
                    <livewire:add-to-cart-button
                        :product-id="$product->id"
                        label="Thêm vào đơn sỉ"
                        button-class="absolute bottom-4 left-4 right-4 flex translate-y-4 items-center justify-center gap-2 rounded-full bg-white/95 py-4 text-xs font-semibold uppercase tracking-[0.2em] text-primary opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100"
                        :key="'shop-add-'.$product->id" />
                </div>
                <div class="mb-2 flex items-start justify-between gap-4">
                    <h3 class="font-headline text-3xl leading-none text-primary">{{ $product->name }}</h3>
                    <span class="rounded-full bg-secondary-container px-3 py-1 text-sm font-bold text-primary">{{ number_format($product->price) }}đ</span>
                </div>
                <p class="mb-4 line-clamp-2 text-sm leading-7 text-on-surface-variant">{{ $product->short_description ?: $product->description }}</p>
                <div class="flex gap-2">
                    @if($product->category)
                        <span class="rounded-full border border-outline-variant px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-on-surface-variant">{{ $product->category->name }}</span>
                    @endif
                    <span class="rounded-full border border-outline-variant px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-on-surface-variant">MOQ {{ number_format($product->min_order_quantity) }}</span>
                    @if($product->unit)
                        <span class="rounded-full border border-outline-variant px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-on-surface-variant">{{ $product->unit }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
