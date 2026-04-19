<section class="px-8 py-20">
    <div class="mx-auto max-w-5xl rounded-[2rem] border border-slate-200 bg-white p-10 shadow-lg shadow-slate-200/60 md:p-14">
        @if(!empty($data['heading']))
            <h2 class="font-headline text-4xl text-slate-950 md:text-5xl">{{ $data['heading'] }}</h2>
        @endif
        <div class="prose prose-slate mt-6 max-w-none text-slate-700">
            {!! $data['content'] ?? '' !!}
        </div>
    </div>
</section>
