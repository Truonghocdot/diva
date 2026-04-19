<section class="px-8 py-20">
    <div class="mx-auto max-w-screen-2xl overflow-hidden rounded-[2.5rem] bg-[linear-gradient(135deg,_#0f4cbd_0%,_#2563eb_55%,_#60a5fa_100%)] p-10 text-white shadow-2xl shadow-blue-200/70 md:p-16">
        <div class="max-w-3xl">
            <h2 class="font-headline text-4xl md:text-5xl">{{ $data['heading'] ?? '' }}</h2>
            @if(!empty($data['content']))
                <p class="mt-6 text-lg leading-8 text-blue-50">{{ $data['content'] }}</p>
            @endif
            @if(!empty($data['button_label']) && !empty($data['button_url']))
                <a href="{{ $data['button_url'] }}" class="mt-8 inline-flex items-center rounded-full bg-white px-7 py-4 text-sm font-semibold text-primary transition hover:bg-blue-50">
                    {{ $data['button_label'] }}
                </a>
            @endif
        </div>
    </div>
</section>
