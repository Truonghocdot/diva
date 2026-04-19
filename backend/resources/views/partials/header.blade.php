<!-- Thanh điều hướng trên cùng -->
@php
    $isLoggedIn = auth()->check();
    $user = auth()->user();
    $wishlistCount = $isLoggedIn ? \App\Models\Wishlist::where('user_id', $user->id)->count() : 0;
@endphp
<nav class="{{ $header_class ?? 'fixed top-0 w-full z-50 bg-[#f8faf9]/60 dark:bg-[#2d3434]/60 backdrop-blur-md bg-gradient-to-b from-[#dde4e3]/20 to-transparent' }}">
    <div class="flex justify-between items-center px-8 py-6 max-w-screen-2xl mx-auto">
        <div class="flex items-center gap-12">
            <a class="text-2xl font-headline italic text-[#2d3434] dark:text-[#f8faf9]" href="{{ url('/') }}">Diva</a>
            <div class="hidden md:flex items-center gap-8">
                <a class="{{ request()->is('shop*') ? 'text-[#53644d] dark:text-[#ecffe1] border-b border-[#53644d] pb-1' : 'text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d]' }} font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/shop') }}">Cửa hàng</a>
                 <a class="text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d] transition-colors font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/shop?category=starter-kits') }}">Bộ kit</a>
                <a class="text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d] transition-colors font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/shop?category=candle-supplies') }}">Nguyên liệu</a>
                <a class="{{ request()->is('blog*') ? 'text-[#53644d] dark:text-[#ecffe1] border-b border-[#53644d] pb-1' : 'text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d]' }} font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/blog') }}">Tin tức</a>
                <a class="{{ request()->is('about') ? 'text-[#53644d] dark:text-[#ecffe1] border-b border-[#53644d] pb-1' : 'text-[#2d3434]/70 dark:text-[#f8faf9]/70 hover:text-[#53644d]' }} font-headline font-light tracking-tight transition-all duration-300"
                    href="{{ url('/about') }}">Về chúng tôi</a>
            </div>
        </div>
        <div class="flex items-center gap-6">
            <!-- @if($isLoggedIn)
                <a
                    href="{{ url('/admin') }}"
                    class="inline-flex items-center gap-2 text-[#53644d] dark:text-[#ecffe1] hover:opacity-80 transition-all duration-300"
                    title="Tài khoản của bạn"
                >
                    <span class="material-symbols-outlined">person</span>
                    <span class="hidden lg:inline text-xs font-medium max-w-[110px] truncate">{{ $user?->name }}</span>
                </a>
            @else
                <a
                    href="{{ url('/admin/login') }}"
                    class="material-symbols-outlined text-[#53644d] dark:text-[#ecffe1] hover:opacity-80 transition-all duration-300 active:scale-95"
                    title="Đăng nhập"
                >person</a>
            @endif -->

            <a href="{{ url('/shop') }}" class="relative group" title="Yêu thích">
                <span
                    class="material-symbols-outlined text-[#53644d] dark:text-[#ecffe1] hover:opacity-80 transition-all duration-300 active:scale-95"
                >favorite</span>
                <span
                    class="absolute -top-1 -right-1 flex h-4 min-w-4 px-1 items-center justify-center rounded-full bg-primary text-[10px] text-on-primary font-bold"
                >
                    {{ $wishlistCount }}
                </span>
            </a>
            <livewire:cart-icon />
        </div>
    </div>
</nav>
