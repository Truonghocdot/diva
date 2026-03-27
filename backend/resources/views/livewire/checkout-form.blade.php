<div class="flex flex-col lg:flex-row gap-12">
    <section class="flex-1 space-y-8">
        <h1 class="text-4xl font-headline font-light">Thanh toán</h1>

        @error('cart')
            <div class="rounded-lg bg-error-container/20 text-error px-4 py-3 text-sm">{{ $message }}</div>
        @enderror

        @if($placedOrderNumber)
            <div class="rounded-xl bg-primary-container px-6 py-5 text-on-primary-container">
                <p class="font-semibold mb-1">Đặt hàng thành công</p>
                <p class="text-sm">Mã đơn hàng của bạn: <span class="font-bold">{{ $placedOrderNumber }}</span></p>
            </div>
        @endif

        <form wire:submit="placeOrder" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2">Họ tên</label>
                    <input wire:model="customerName" type="text" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('customerName') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2">Số điện thoại</label>
                    <input wire:model="customerPhone" type="text" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('customerPhone') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-2">Email</label>
                    <input wire:model="customerEmail" type="email" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('customerEmail') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-2">Địa chỉ</label>
                    <input wire:model="shippingAddressLine1" type="text" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('shippingAddressLine1') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-2">Địa chỉ bổ sung</label>
                    <input wire:model="shippingAddressLine2" type="text" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('shippingAddressLine2') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2">Thành phố</label>
                    <input wire:model="shippingCity" type="text" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('shippingCity') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2">Tỉnh/Thành</label>
                    <input wire:model="shippingProvince" type="text" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('shippingProvince') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2">Mã bưu chính</label>
                    <input wire:model="shippingPostalCode" type="text" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('shippingPostalCode') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-widest mb-2">Quốc gia</label>
                    <input wire:model="shippingCountry" type="text" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3" />
                    @error('shippingCountry') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-2">Phương thức thanh toán</label>
                    <select wire:model="paymentMethod" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3">
                        <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                        <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                    </select>
                    @error('paymentMethod') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs uppercase tracking-widest mb-2">Ghi chú</label>
                    <textarea wire:model="notes" rows="3" class="w-full rounded-lg border border-outline-variant/30 bg-white px-4 py-3"></textarea>
                    @error('notes') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="w-full md:w-auto bg-primary text-on-primary px-8 py-4 rounded-lg font-semibold hover:bg-primary-dim transition-colors"
            >
                <span wire:loading.remove wire:target="placeOrder">Đặt hàng</span>
                <span wire:loading wire:target="placeOrder">Đang xử lý...</span>
            </button>
        </form>
    </section>

    <aside class="w-full lg:w-[420px] bg-surface-container-low rounded-xl p-6 h-fit">
        <h2 class="font-headline text-2xl mb-6">Đơn hàng của bạn</h2>

        @if(!$this->cart || $this->cart->items->isEmpty())
            <p class="text-on-surface-variant">Giỏ hàng đang trống.</p>
        @else
            <div class="space-y-5">
                @foreach($this->cart->items as $item)
                    <div class="flex items-start gap-4">
                        <img src="{{ $item->product?->image }}" alt="{{ $item->product?->name }}" class="w-16 h-16 rounded-lg object-cover bg-surface-container-highest" />
                        <div class="flex-1">
                            <p class="font-medium">{{ $item->product?->name }}</p>
                            <p class="text-sm text-on-surface-variant">{{ number_format($item->price) }}đ</p>
                            <div class="mt-2 inline-flex items-center gap-2">
                                <button type="button" wire:click="decrementQuantity({{ $item->id }})" class="w-7 h-7 rounded border border-outline-variant/40">-</button>
                                <span class="w-6 text-center">{{ $item->quantity }}</span>
                                <button type="button" wire:click="incrementQuantity({{ $item->id }})" class="w-7 h-7 rounded border border-outline-variant/40">+</button>
                            </div>
                        </div>
                        <button type="button" wire:click="removeItem({{ $item->id }})" class="text-sm text-on-surface-variant hover:text-error">Xóa</button>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 pt-6 border-t border-outline-variant/20 space-y-2 text-sm">
                <div class="flex justify-between">
                    <span>Tạm tính</span>
                    <span>{{ number_format($this->subtotal) }}đ</span>
                </div>
                <div class="flex justify-between">
                    <span>Phí vận chuyển</span>
                    <span>{{ number_format($shippingFee) }}đ</span>
                </div>
                <div class="flex justify-between">
                    <span>Giảm giá</span>
                    <span>-{{ number_format($discountAmount) }}đ</span>
                </div>
                <div class="flex justify-between pt-3 border-t border-outline-variant/20 font-bold text-base">
                    <span>Tổng cộng</span>
                    <span>{{ number_format($this->total) }}đ</span>
                </div>
            </div>
        @endif
    </aside>
</div>

@if(config('services.google.analytics_id') || config('services.google.ads_id'))
<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('order-placed', function (payload) {
            if (typeof gtag !== 'function') {
                return;
            }

            const orderNumber = payload.orderNumber ?? '';
            const totalAmount = Number(payload.totalAmount ?? 0);

            gtag('event', 'purchase', {
                transaction_id: orderNumber,
                value: totalAmount,
                currency: 'VND'
            });

            @if(config('services.google.ads_id') && config('services.google.ads_conversion_label'))
            gtag('event', 'conversion', {
                send_to: '{{ config('services.google.ads_id') }}/{{ config('services.google.ads_conversion_label') }}',
                value: totalAmount,
                currency: 'VND',
                transaction_id: orderNumber
            });
            @endif
        });
    });
</script>
@endif
