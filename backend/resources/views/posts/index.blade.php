@extends('layouts.app')

@section('title', 'Bài viết & kiến thức nguyên liệu | Diva Materials')
@section('meta_description', 'Khám phá kiến thức nguyên liệu, vận hành mua sỉ, phát triển công thức và các câu chuyện phía sau hệ sinh thái Diva Materials.')

@section('content')
<main class="pb-24 pt-32">
    <section class="mx-auto mb-16 max-w-screen-2xl px-8">
        <div class="max-w-3xl">
            <span class="inline-flex rounded-full border border-secondary/20 bg-white px-4 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-secondary">Tạp chí nội dung</span>
            <h1 class="mt-5 text-6xl font-headline font-light text-primary md:text-7xl">
                Bài viết & <br />
                <span class="font-normal text-secondary">kiến thức nguyên liệu</span>
            </h1>
            <p class="mt-6 text-xl font-light leading-relaxed text-on-surface-variant">
                Nơi chúng tôi chia sẻ về tư duy xây dựng catalogue, chọn nguyên liệu, tối ưu vận hành mua sỉ và những câu chuyện phía sau thương hiệu Diva Materials.
            </p>
        </div>
    </section>

    <section class="mx-auto mb-12 max-w-screen-2xl px-8">
        <div class="flex flex-wrap items-center gap-4 border-b border-outline-variant/30 pb-8">
            <a href="{{ url('/blog') }}"
               class="rounded-full px-6 py-2 text-sm font-medium transition-all {{ !request('category') ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container' }}">
               Tất cả
            </a>
            @foreach($categories as $category)
            <a href="{{ url('/blog?category=' . $category->slug) }}"
               class="rounded-full px-6 py-2 text-sm font-medium transition-all {{ request('category') == $category->slug ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container' }}">
               {{ $category->name }} ({{ $category->posts_count }})
            </a>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-screen-2xl px-8">
        @if($posts->count() > 0)
        <div class="grid grid-cols-1 gap-x-8 gap-y-16 md:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
            <article class="group cursor-pointer" onclick="window.location='{{ url('/blog/' . $post->slug) }}'">
                <div class="relative mb-6 aspect-[16/10] overflow-hidden rounded-2xl">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1541462608141-ad60163ee283?q=80&w=2070&auto=format&fit=crop' }}"
                         alt="{{ $post->title }}"
                         class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute left-4 top-4">
                        <span class="rounded-full bg-white/90 px-4 py-1.5 text-[10px] font-bold uppercase tracking-wider text-primary shadow-sm backdrop-blur-md">
                            {{ $post->category->name }}
                        </span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 text-xs uppercase tracking-widest text-on-surface-variant/70">
                        <span>{{ $post->published_at ? $post->published_at->format('d M, Y') : $post->created_at->format('d M, Y') }}</span>
                        <span class="h-1 w-1 rounded-full bg-outline-variant"></span>
                        <span>{{ $post->author->name }}</span>
                    </div>
                    <h2 class="text-3xl font-headline leading-tight transition-colors group-hover:text-primary">
                        {{ $post->title }}
                    </h2>
                    <p class="line-clamp-3 font-light leading-relaxed text-on-surface-variant">
                        {{ $post->excerpt }}
                    </p>
                    <div class="pt-4">
                        <span class="inline-flex items-center gap-2 font-medium text-primary transition-all duration-300 hover:gap-4">
                            Đọc tiếp
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-16 flex justify-center">
            {{ $posts->links() }}
        </div>
        @else
        <div class="py-24 text-center">
            <div class="mb-6">
                <span class="material-symbols-outlined text-6xl text-outline-variant/30">auto_stories</span>
            </div>
            <h3 class="text-2xl font-headline">Chưa có bài viết nào</h3>
            <p class="mt-2 font-light text-on-surface-variant">Chúng tôi đang chuẩn bị những nội dung thú vị. Hãy quay lại sau nhé!</p>
            <a href="{{ url('/') }}" class="mt-8 inline-block border-b border-primary/30 pb-1 text-primary transition-all hover:border-primary">Quay lại trang chủ</a>
        </div>
        @endif
    </section>
</main>

@include('partials.newsletter')
@endsection
