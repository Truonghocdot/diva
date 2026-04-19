<section class="px-8 py-20">
    <div class="panel-soft mx-auto max-w-5xl rounded-[2rem] p-10 md:p-14">
        @if(!empty($data['heading']))
            <h2 class="font-headline text-5xl leading-none text-primary md:text-6xl">{{ $data['heading'] }}</h2>
        @endif
        <div class="prose prose-lg mt-6 max-w-none text-on-surface-variant prose-headings:font-headline prose-headings:text-primary prose-p:leading-8 prose-strong:text-primary prose-li:text-on-surface-variant">
            {!! $data['content'] ?? '' !!}
        </div>
    </div>
</section>
