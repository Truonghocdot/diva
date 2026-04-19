@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' | Diva Blog')
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
    "name": "Diva",
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
<article class="pt-32 pb-24">
    <!-- Hero Section -->
    <header class="max-w-screen-xl mx-auto px-8 mb-16 text-center">
        <div class="inline-block mb-8">
            <a href="{{ url('/blog?category=' . $post->category->slug) }}" 
               class="text-primary font-bold text-[10px] uppercase tracking-[.2em] border border-primary/20 px-6 py-2 rounded-full hover:bg-primary hover:text-on-primary transition-all">
                {{ $post->category->name }}
            </a>
        </div>
        <h1 class="text-5xl md:text-7xl font-headline font-light mb-8 leading-tight max-w-5xl mx-auto">
            {{ $post->title }}
        </h1>
        <div class="flex items-center justify-center gap-6 text-sm text-on-surface-variant/80 uppercase tracking-widest font-light">
            <time datetime="{{ $post->published_at ? $post->published_at->toIso8601String() : $post->created_at->toIso8601String() }}">
                {{ $post->published_at ? $post->published_at->format('d M, Y') : $post->created_at->format('d M, Y') }}
            </time>
            <span class="w-1 h-1 bg-outline-variant/30 rounded-full"></span>
            <span>By {{ $post->author->name }}</span>
        </div>
    </header>

    <!-- Post Featured Image -->
    <div class="max-w-screen-2xl mx-auto px-8 mb-20">
        <div class="aspect-[21/9] rounded-3xl overflow-hidden shadow-2xl skew-y-0 relative">
            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1602874801007-bd458bb1b8b6?q=80&w=2070&auto=format&fit=crop' }}" 
                 alt="{{ $post->title }}"
                 class="w-full h-full object-cover">
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-screen-xl mx-auto px-8 flex flex-col lg:flex-row gap-16">
        <!-- Main Content -->
        <div class="lg:w-2/3">
            <div class="prose prose-xl prose-stone max-w-none text-on-surface font-light leading-relaxed first-letter:text-7xl first-letter:font-headline first-letter:text-primary first-letter:mr-3 first-letter:float-left first-letter:leading-none">
                {!! $post->content !!}
            </div>

            <!-- Share Buttons -->
            <div class="mt-16 pt-8 border-t border-outline-variant/20">
                <p class="text-xs uppercase tracking-widest text-on-surface-variant font-bold mb-6">Chia sẻ bài viết này</p>
                <div class="flex items-center gap-4">
                    <button class="w-12 h-12 rounded-full border border-outline-variant/30 flex items-center justify-center hover:bg-primary hover:text-on-primary transition-all">
                        <span class="material-symbols-outlined text-xl">share</span>
                    </button>
                    <!-- Add more social icons as needed -->
                </div>
            </div>
        </div>

        <!-- Sidebar / Related -->
        <aside class="lg:w-1/3 space-y-16">
            @if($relatedPosts->count() > 0)
            <div class="bg-surface-container-low rounded-3xl p-10">
                <h3 class="text-2xl font-headline mb-8 italic">Có thể bạn quan tâm</h3>
                <div class="space-y-10">
                    @foreach($relatedPosts as $rp)
                    <a href="{{ url('/blog/' . $rp->slug) }}" class="group block">
                        <div class="aspect-[16/9] rounded-xl overflow-hidden mb-4">
                            <img src="{{ $rp->image ? asset('storage/' . $rp->image) : 'https://images.unsplash.com/photo-1541462608141-ad60163ee283?q=80&w=2070&auto=format&fit=crop' }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        </div>
                        <h4 class="font-headline text-lg leading-tight group-hover:text-primary transition-colors">
                            {{ $rp->title }}
                        </h4>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Newsletter Sidebar -->
            <div class="bg-primary text-on-primary rounded-3xl p-10 text-center space-y-6">
                <span class="material-symbols-outlined text-4xl">mark_email_unread</span>
                <h3 class="text-2xl font-headline leading-tight italic">Đừng bỏ lỡ những câu chuyện mùi hương</h3>
                <p class="text-on-primary/80 font-light text-sm">Nhận thông báo về các bài viết mới nhất và ưu đãi độc quyền dành riêng cho bạn.</p>
                <form class="space-y-4">
                    <input type="email" placeholder="Email của bạn" class="w-full bg-white/10 border border-white/20 rounded-xl px-6 py-3 text-white placeholder:text-white/50 focus:outline-none focus:ring-2 focus:ring-white/30 transition-all">
                    <button class="w-full bg-white text-primary font-bold py-3 rounded-xl hover:bg-on-primary-fixed-variant hover:text-on-primary transition-all">Đăng ký ngay</button>
                </form>
            </div>
        </aside>
    </div>
</article>

@include('partials.newsletter')
@endsection
