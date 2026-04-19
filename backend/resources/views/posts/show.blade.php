@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' | Diva Materials')
@section('meta_description', $post->meta_description ?: $post->excerpt)
@section('og_image', $post->image ? asset('storage/' . $post->image) : asset('og-image.jpg'))
@section('og_type', 'article')

@section('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "{{ $post->title }}",
  "image": ["{{ $post->image ? asset('storage/' . $post->image) : asset('og-image.jpg') }}"],
  "datePublished": "{{ $post->published_at ? $post->published_at->toIso8601String() : $post->created_at->toIso8601String() }}",
  "dateModified": "{{ $post->updated_at->toIso8601String() }}",
  "author": {
    "@type": "Person",
    "name": "{{ $post->author->name }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Diva Materials",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('favicon.ico') }}"
    }
  },
  "description": "{{ $post->excerpt }}"
}
</script>
@endsection

@section('content')
<article class="pb-24 pt-32">
    <header class="mx-auto mb-16 max-w-screen-xl px-8 text-center">
        <div class="mb-8 inline-block">
            <a href="{{ url('/blog?category=' . $post->category->slug) }}"
               class="rounded-full border border-primary/20 px-6 py-2 text-[10px] font-bold uppercase tracking-[.2em] text-primary transition-all hover:bg-primary hover:text-on-primary">
                {{ $post->category->name }}
            </a>
        </div>
        <h1 class="mx-auto mb-8 max-w-5xl text-5xl font-headline font-light leading-tight md:text-7xl">
            {{ $post->title }}
        </h1>
        <div class="flex items-center justify-center gap-6 text-sm font-light uppercase tracking-widest text-on-surface-variant/80">
            <time datetime="{{ $post->published_at ? $post->published_at->toIso8601String() : $post->created_at->toIso8601String() }}">
                {{ $post->published_at ? $post->published_at->format('d M, Y') : $post->created_at->format('d M, Y') }}
            </time>
            <span class="h-1 w-1 rounded-full bg-outline-variant/30"></span>
            <span>Tác giả: {{ $post->author->name }}</span>
        </div>
    </header>

    <div class="mx-auto mb-20 max-w-screen-2xl px-8">
        <div class="relative aspect-[21/9] overflow-hidden rounded-3xl shadow-2xl">
            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1602874801007-bd458bb1b8b6?q=80&w=2070&auto=format&fit=crop' }}"
                 alt="{{ $post->title }}"
                 class="h-full w-full object-cover">
        </div>
    </div>

    <div class="mx-auto flex max-w-screen-xl flex-col gap-16 px-8 lg:flex-row">
        <div class="lg:w-2/3">
            <div class="prose prose-xl prose-stone max-w-none font-light leading-relaxed text-on-surface first-letter:mr-3 first-letter:float-left first-letter:font-headline first-letter:text-7xl first-letter:leading-none first-letter:text-primary">
                {!! $post->content !!}
            </div>

            <div class="mt-16 border-t border-outline-variant/20 pt-8">
                <p class="mb-6 text-xs font-bold uppercase tracking-widest text-on-surface-variant">Chia sẻ bài viết này</p>
                <div class="flex items-center gap-4">
                    <button class="flex h-12 w-12 items-center justify-center rounded-full border border-outline-variant/30 transition-all hover:bg-primary hover:text-on-primary">
                        <span class="material-symbols-outlined text-xl">share</span>
                    </button>
                </div>
            </div>
        </div>

        <aside class="space-y-16 lg:w-1/3">
            @if($relatedPosts->count() > 0)
            <div class="rounded-3xl bg-surface-container-low p-10">
                <h3 class="mb-8 text-2xl font-headline">Có thể bạn quan tâm</h3>
                <div class="space-y-10">
                    @foreach($relatedPosts as $rp)
                    <a href="{{ url('/blog/' . $rp->slug) }}" class="group block">
                        <div class="mb-4 aspect-[16/9] overflow-hidden rounded-xl">
                            <img src="{{ $rp->image ? asset('storage/' . $rp->image) : 'https://images.unsplash.com/photo-1541462608141-ad60163ee283?q=80&w=2070&auto=format&fit=crop' }}"
                                 class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h4 class="font-headline text-lg leading-tight transition-colors group-hover:text-primary">
                            {{ $rp->title }}
                        </h4>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="space-y-6 rounded-3xl bg-primary p-10 text-center text-on-primary">
                <span class="material-symbols-outlined text-4xl">mark_email_unread</span>
                <h3 class="text-2xl font-headline leading-tight">Đừng bỏ lỡ các cập nhật về nguyên liệu và vận hành B2B</h3>
                <p class="text-sm font-light text-on-primary/80">Nhận thông báo về các bài viết mới nhất, xu hướng nguyên liệu và nội dung chuyên sâu dành cho đội mua hàng.</p>
                <form class="space-y-4">
                    <input type="email" placeholder="Email của bạn" class="w-full rounded-xl border border-white/20 bg-white/10 px-6 py-3 text-white placeholder:text-white/50 transition-all focus:outline-none focus:ring-2 focus:ring-white/30">
                    <button class="w-full rounded-xl bg-white py-3 font-bold text-primary transition-all hover:bg-on-primary-fixed-variant hover:text-on-primary">Đăng ký ngay</button>
                </form>
            </div>
        </aside>
    </div>
</article>

@include('partials.newsletter')
@endsection
