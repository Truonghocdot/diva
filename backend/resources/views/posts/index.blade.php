@extends('layouts.app')

@section('title', 'Tin tức & Chia sẻ | Diva - Scented Candles')
@section('meta_description', 'Khám phá những câu chuyện về mùi hương, mẹo chăm sóc nến thơm và những bí quyết tạo không gian sống thư thái cùng Diva.')

@section('content')
<main class="pt-32 pb-24">
    <!-- Header Section -->
    <section class="max-w-screen-2xl mx-auto px-8 mb-16">
        <div class="max-w-3xl">
            <h1 class="text-6xl md:text-7xl font-headline font-light text-on-surface mb-6 italic">
                Tin tức & <br />
                <span class="not-italic font-normal text-primary">Cảm hứng</span>
            </h1>
            <p class="text-xl text-on-surface-variant font-light leading-relaxed">
                Nơi chúng tôi chia sẻ về nghệ thuật hương thơm, cách tối ưu hóa trải nghiệm nến thơm và những câu chuyện phía sau thương hiệu Diva.
            </p>
        </div>
    </section>

    <!-- Categories Filter -->
    <section class="max-w-screen-2xl mx-auto px-8 mb-12">
        <div class="flex flex-wrap items-center gap-4 border-b border-outline-variant/30 pb-8">
            <a href="{{ url('/blog') }}" 
               class="px-6 py-2 rounded-full {{ !request('category') ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container' }} transition-all text-sm font-medium">
               Tất cả
            </a>
            @foreach($categories as $category)
            <a href="{{ url('/blog?category=' . $category->slug) }}" 
               class="px-6 py-2 rounded-full {{ request('category') == $category->slug ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container' }} transition-all text-sm font-medium">
               {{ $category->name }} ({{ $category->posts_count }})
            </a>
            @endforeach
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="max-w-screen-2xl mx-auto px-8">
        @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16">
            @foreach($posts as $post)
            <article class="group cursor-pointer" onclick="window.location='{{ url('/blog/' . $post->slug) }}'">
                <div class="aspect-[16/10] overflow-hidden rounded-2xl mb-6 relative">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1541462608141-ad60163ee283?q=80&w=2070&auto=format&fit=crop' }}" 
                         alt="{{ $post->title }}"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-md text-primary px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm">
                            {{ $post->category->name }}
                        </span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 text-xs text-on-surface-variant/70 uppercase tracking-widest">
                        <span>{{ $post->published_at ? $post->published_at->format('d M, Y') : $post->created_at->format('d M, Y') }}</span>
                        <span class="w-1 h-1 bg-outline-variant rounded-full"></span>
                        <span>{{ $post->author->name }}</span>
                    </div>
                    <h2 class="text-3xl font-headline group-hover:text-primary transition-colors leading-tight">
                        {{ $post->title }}
                    </h2>
                    <p class="text-on-surface-variant font-light line-clamp-3 leading-relaxed">
                        {{ $post->excerpt }}
                    </p>
                    <div class="pt-4">
                        <span class="inline-flex items-center gap-2 text-primary font-medium hover:gap-4 transition-all duration-300">
                            Đọc tiếp
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-16 flex justify-center">
            {{ $posts->links() }}
        </div>
        @else
        <div class="py-24 text-center">
            <div class="mb-6">
                <span class="material-symbols-outlined text-6xl text-outline-variant/30">auto_stories</span>
            </div>
            <h3 class="text-2xl font-headline">Chưa có bài viết nào</h3>
            <p class="text-on-surface-variant mt-2 font-light">Chúng tôi đang chuẩn bị những nội dung thú vị. Hãy quay lại sau nhé!</p>
            <a href="{{ url('/') }}" class="inline-block mt-8 text-primary border-b border-primary/30 pb-1 hover:border-primary transition-all">Quay lại trang chủ</a>
        </div>
        @endif
    </section>
</main>

@include('partials.newsletter')
@endsection
