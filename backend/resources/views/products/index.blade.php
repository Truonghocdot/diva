@extends('layouts.app')

@section('title', 'Catalog Nguyen Lieu | Diva Materials')
@section('meta_description', 'Catalog mua si nguyen lieu, huong lieu, bao bi va phu lieu cho doanh nghiep san xuat va workshop.')
@section('canonical_url', request('category') ? url('/shop?category=' . request('category')) : url('/shop'))

@php
$header_class = 'fixed top-0 w-full z-50 glass-nav';
@endphp

@section('content')
<main class="mx-auto max-w-screen-2xl px-8 pb-24 pt-32 lg:px-12">
    <header class="mb-16 flex flex-col justify-between gap-8 md:flex-row md:items-end">
        <div class="max-w-2xl">
            <span class="inline-flex rounded-full border border-blue-200 bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-primary">Wholesale catalog</span>
            <h1 class="mt-5 font-headline text-5xl leading-tight text-slate-950 lg:text-6xl">Nguyen lieu va phu lieu <br /><span class="text-primary">danh cho don hang so luong lon</span></h1>
            <p class="mt-4 max-w-lg leading-8 text-slate-600">Chon nhanh theo danh muc, MOQ va quy cach dong goi de lap don mua si cho workshop, nha may va doi thuong mai.</p>
        </div>
        <div class="flex items-center gap-4 rounded-full border border-slate-200 bg-white px-5 py-3 shadow-sm">
            <span class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Sap xep</span>
            <select class="cursor-pointer border-none bg-transparent py-1 pl-0 pr-8 text-sm font-medium text-primary focus:ring-0">
                <option>San pham noi bat</option>
                <option>Moi nhat</option>
                <option>MOQ thap nhat</option>
                <option>Ton kho cao nhat</option>
            </select>
        </div>
    </header>

    <div class="flex flex-col lg:flex-row gap-16">
        <aside class="w-full lg:w-64 flex-shrink-0 space-y-12">
            <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-lg shadow-slate-200/60">
                <h3 class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-slate-500">Danh muc nguyen lieu</h3>
                <div class="space-y-3">
                    <a href="{{ url('/shop') }}" class="block rounded-full px-4 py-2 text-sm {{ request('category') ? 'text-slate-600 hover:text-primary' : 'bg-blue-50 font-semibold text-primary' }}">Tat ca</a>
                    @foreach($categories as $category)
                        <a href="{{ url('/shop?category=' . $category->slug) }}" class="block rounded-full px-4 py-2 text-sm {{ request('category') == $category->slug ? 'bg-blue-50 font-semibold text-primary' : 'text-slate-600 hover:text-primary' }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </section>
        </aside>

        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-16">
            @foreach($products as $product)
            <div class="group cursor-pointer" onclick="window.location='{{ url('/products/' . $product->slug) }}'">
                <div class="relative mb-6 aspect-[4/5] overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-lg shadow-slate-200/60">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $product->image }}" />
                    <livewire:add-to-cart-button
                        :product-id="$product->id"
                        label="Them vao don si"
                        button-class="absolute bottom-4 left-4 right-4 flex translate-y-4 items-center justify-center gap-2 rounded-full bg-white/95 py-4 text-xs font-semibold uppercase tracking-[0.2em] text-slate-900 opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100"
                        :key="'shop-add-'.$product->id" />
                </div>
                <div class="mb-2 flex items-start justify-between gap-4">
                    <h3 class="font-headline text-2xl text-slate-950">{{ $product->name }}</h3>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-sm font-bold text-primary">{{ number_format($product->price) }}đ</span>
                </div>
                <p class="mb-4 line-clamp-2 text-sm leading-7 text-slate-600">{{ $product->short_description ?: $product->description }}</p>
                <div class="flex gap-2">
                    @if($product->category)
                        <span class="rounded-full border border-slate-200 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $product->category->name }}</span>
                    @endif
                    <span class="rounded-full border border-slate-200 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">MOQ {{ number_format($product->min_order_quantity) }}</span>
                    @if($product->unit)
                        <span class="rounded-full border border-slate-200 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $product->unit }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
