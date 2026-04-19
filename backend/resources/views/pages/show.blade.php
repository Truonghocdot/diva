@extends('layouts.app')

@section('title', $page->meta_title ?: ($page->title . ' | Diva Materials'))
@section('meta_description', $page->meta_description ?: ($page->summary ?: 'Nha cung cap nguyen lieu, phu lieu va giai phap mua si cho doanh nghiep san xuat.'))
@section('canonical_url', $page->is_homepage ? url('/') : url('/' . $page->slug))
@if(($isPreview ?? false) === true)
    @section('meta_robots', 'noindex,nofollow')
@endif

@php
    $header_class = 'fixed top-0 w-full z-50 border-b border-white/60 bg-white/85 backdrop-blur-xl';
@endphp

@section('content')
    <main class="overflow-hidden">
        @if(($isPreview ?? false) === true)
            <div class="border-b border-amber-200 bg-amber-50 px-8 py-3 text-sm text-amber-900">
                Dang xem ban preview cua page draft. Link nay co thoi han va khong duoc index.
            </div>
        @endif
        @forelse($page->content ?? [] as $block)
            @php
                $type = $block['type'] ?? null;
            @endphp

            @switch($type)
                @case('hero')
                    @include('pages.blocks.hero', ['data' => $block['data'] ?? []])
                    @break

                @case('rich_text')
                    @include('pages.blocks.rich-text', ['data' => $block['data'] ?? []])
                    @break

                @case('stats')
                    @include('pages.blocks.stats', ['data' => $block['data'] ?? []])
                    @break

                @case('feature_cards')
                    @include('pages.blocks.feature-cards', ['data' => $block['data'] ?? []])
                    @break

                @case('category_grid')
                    @include('pages.blocks.category-grid', ['data' => $block['data'] ?? []])
                    @break

                @case('product_showcase')
                    @include('pages.blocks.product-showcase', ['data' => $block['data'] ?? []])
                    @break

                @case('call_to_action')
                    @include('pages.blocks.call-to-action', ['data' => $block['data'] ?? []])
                    @break
            @endswitch
        @empty
            <section class="px-8 pb-24 pt-40">
                <div class="mx-auto max-w-4xl rounded-[2rem] border border-slate-200 bg-white p-10 shadow-xl shadow-slate-200/70">
                    <h1 class="font-headline text-5xl text-slate-950">{{ $page->title }}</h1>
                    @if($page->summary)
                        <p class="mt-6 text-lg leading-8 text-slate-600">{{ $page->summary }}</p>
                    @endif
                </div>
            </section>
        @endforelse
    </main>
@endsection
