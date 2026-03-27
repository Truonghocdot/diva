<a href="{{ url('/checkout') }}" class="relative group">
    <span class="material-symbols-outlined text-[#53644d] dark:text-[#ecffe1] hover:opacity-80 transition-all duration-300 active:scale-95">
        shopping_bag
    </span>
    <span
        class="absolute -top-1 -right-1 flex h-4 min-w-4 px-1 items-center justify-center rounded-full bg-primary text-[10px] text-on-primary font-bold"
    >
        {{ $count }}
    </span>
</a>
