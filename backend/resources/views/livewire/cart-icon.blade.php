<a href="{{ url('/checkout') }}" class="relative flex h-12 w-12 items-center justify-center rounded-full border border-outline-variant bg-white shadow-sm transition hover:border-secondary hover:text-primary">
    <span class="material-symbols-outlined text-slate-700">
        shopping_bag
    </span>
    <span
        class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-primary px-1 text-[10px] font-bold text-white"
    >
        {{ $count }}
    </span>
</a>
