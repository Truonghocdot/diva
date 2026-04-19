<div class="flex flex-col gap-12 lg:flex-row">
    <section class="flex-1 space-y-8">
        <div class="space-y-3">
            <span class="inline-flex items-center rounded-full bg-primary/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-primary">Đơn hàng B2B</span>
            <h1 class="text-5xl font-headline font-light text-primary">Đặt mua sỉ / yêu cầu báo giá</h1>
            <p class="max-w-2xl text-sm leading-7 text-on-surface-variant">Nhập thông tin doanh nghiệp và đầu mối liên hệ để đội ngũ kinh doanh xác nhận tồn kho, lead time và báo giá cuối cùng cho đơn hàng số lượng lớn.</p>
        </div>

        @error('cart')
            <div class="rounded-lg bg-error-container/20 px-4 py-3 text-sm text-error">{{ $message }}</div>
        @enderror

        @if($placedOrderNumber)
            <div class="rounded-3xl border border-primary/15 bg-primary/5 px-6 py-5 text-slate-900">
                <p class="mb-1 font-semibold">Đã tiếp nhận yêu cầu đặt mua</p>
                <p class="text-sm">Mã yêu cầu của bạn: <span class="font-bold">{{ $placedOrderNumber }}</span></p>
            </div>
        @endif

        <form wire:submit="placeOrder" class="space-y-8">
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Tên doanh nghiệp</label>
                    <input wire:model="companyName" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('companyName') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Mã số thuế</label>
                    <input wire:model="taxCode" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('taxCode') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Người liên hệ</label>
                    <input wire:model="customerName" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('customerName') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Chức vụ</label>
                    <input wire:model="contactPosition" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('contactPosition') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Số điện thoại</label>
                    <input wire:model="customerPhone" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('customerPhone') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Email</label>
                    <input wire:model="customerEmail" type="email" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('customerEmail') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Địa chỉ giao / xuất hóa đơn</label>
                    <input wire:model="shippingAddressLine1" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingAddressLine1') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Địa chỉ bổ sung</label>
                    <input wire:model="shippingAddressLine2" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingAddressLine2') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Thành phố</label>
                    <input wire:model="shippingCity" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingCity') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Tỉnh / Thành</label>
                    <input wire:model="shippingProvince" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingProvince') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Mã bưu chính</label>
                    <input wire:model="shippingPostalCode" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingPostalCode') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Quốc gia</label>
                    <input wire:model="shippingCountry" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingCountry') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Phương thức thanh toán ưu tiên</label>
                    <select wire:model="paymentMethod" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm">
                        <option value="cod">Công nợ / thanh toán theo xác nhận đơn</option>
                        <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                    </select>
                    @error('paymentMethod') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Ghi chú đơn hàng</label>
                    <textarea wire:model="notes" rows="3" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm"></textarea>
                    @error('notes') <p class="mt-1 text-sm text-error">{{ $message }}</p> @enderror
                </div>
            </div>

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="w-full rounded-full bg-primary px-8 py-4 font-semibold uppercase tracking-[0.14em] text-white shadow-lg shadow-primary/20 transition-colors hover:bg-primary-dim md:w-auto"
            >
                <span wire:loading.remove wire:target="placeOrder">Gửi yêu cầu mua sỉ</span>
                <span wire:loading wire:target="placeOrder">Đang xử lý...</span>
            </button>
        </form>
    </section>

    <aside class="h-fit w-full rounded-[2rem] border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60 lg:w-[420px]">
        <h2 class="mb-6 font-headline text-3xl text-primary">Danh sách sản phẩm trong đơn</h2>
        <div class="mb-6 rounded-[1.5rem] bg-surface-container px-5 py-4">
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-on-surface-variant">Quy trình xử lý</p>
            <p class="mt-2 text-sm leading-7 text-primary">Sau khi gửi, đội ngũ kinh doanh sẽ xác nhận tồn kho, quy cách giao và đơn giá theo số lượng.</p>
        </div>

        @if(!$this->cart || $this->cart->items->isEmpty())
            <p class="text-slate-500">Đơn mua sỉ của bạn đang trống.</p>
        @else
            <div class="space-y-5">
                @foreach($this->cart->items as $item)
                    <div class="flex items-start gap-4">
                        <img src="{{ $item->product?->image }}" alt="{{ $item->product?->name }}" class="h-16 w-16 rounded-2xl bg-slate-100 object-cover" />
                        <div class="flex-1">
                            <p class="font-medium text-slate-900">{{ $item->product?->name }}</p>
                            <p class="text-sm text-slate-500">{{ number_format($item->price) }}đ / {{ $item->product?->unit ?: 'đơn vị' }}</p>
                            <div class="mt-2 inline-flex items-center gap-2">
                                <button type="button" wire:click="decrementQuantity({{ $item->id }})" class="h-8 w-8 rounded-full border border-slate-200 text-slate-700">-</button>
                                <span class="w-6 text-center">{{ $item->quantity }}</span>
                                <button type="button" wire:click="incrementQuantity({{ $item->id }})" class="h-8 w-8 rounded-full border border-slate-200 text-slate-700">+</button>
                            </div>
                        </div>
                        <button type="button" wire:click="removeItem({{ $item->id }})" class="text-sm text-slate-500 hover:text-red-500">Xóa</button>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 space-y-2 border-t border-slate-200 pt-6 text-sm text-slate-700">
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
                <div class="flex justify-between border-t border-slate-200 pt-3 text-base font-bold text-slate-950">
                    <span>Tổng tạm tính</span>
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
