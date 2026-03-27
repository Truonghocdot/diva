<!-- Top Navigation Bar -->
<nav class="{{ $header_class ?? 'fixed top-0 w-full z-50 bg-[#f8faf9]/60 dark:bg-[#2d3434]/60 backdrop-blur-md bg-gradient-to-b from-[#dde4e3]/20 to-transparent' }}">
    <div class="flex justify-between items-center px-8 py-6 max-w-screen-2xl mx-auto">
        <div class="flex items-center gap-12">
            <a class="text-2xl font-headline italic text-[#2d3434] dark:text-[#f8faf9]" href="{{ url('/') }}">Diva</a>
            <div class="hidden md:flex items-center gap-8">
                <a class="{{ request()->is('shop*') ? 'text-[#53644d] dark:text-[#ecffe1] border-b border-[#53644d] pb-1' : 'text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d]' }} font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/shop') }}">Shop Candles</a>
                 <a class="text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d] transition-colors font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/shop?category=starter-kits') }}">Kits</a>
                <a class="text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d] transition-colors font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/shop?category=candle-supplies') }}">Supplies</a>
                <a class="{{ request()->is('about') ? 'text-[#53644d] dark:text-[#ecffe1] border-b border-[#53644d] pb-1' : 'text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d]' }} font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/about') }}">About Us</a>
            </div>
        </div>
        <div class="flex items-center gap-6">
            <button
                class="material-symbols-outlined text-[#53644d] dark:text-[#ecffe1] hover:opacity-80 transition-all duration-300 active:scale-95">person</button>
            <button
                class="material-symbols-outlined text-[#53644d] dark:text-[#ecffe1] hover:opacity-80 transition-all duration-300 active:scale-95">favorite</button>
            <livewire:cart-icon />
        </div>
    </div>
</nav>
