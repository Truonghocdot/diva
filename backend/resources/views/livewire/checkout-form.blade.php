<div class="flex flex-col lg:flex-row gap-12">
    <section class="flex-1 space-y-8">
        <div class="space-y-3">
            <span class="inline-flex items-center rounded-full bg-primary/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-primary">Don hang B2B</span>
            <h1 class="text-4xl font-headline font-light text-slate-950">Dat mua si / yeu cau bao gia</h1>
            <p class="max-w-2xl text-sm leading-7 text-slate-600">Nhap thong tin doanh nghiep va dau moi lien he de doi ngu kinh doanh xac nhan ton kho, lead time va bao gia cuoi cung cho don hang so luong lon.</p>
        </div>

        @error('cart')
            <div class="rounded-lg bg-error-container/20 text-error px-4 py-3 text-sm">{{ $message }}</div>
        @enderror

        @if($placedOrderNumber)
            <div class="rounded-3xl border border-primary/15 bg-primary/5 px-6 py-5 text-slate-900">
                <p class="font-semibold mb-1">Da tiep nhan yeu cau dat mua</p>
                <p class="text-sm">Ma yeu cau cua ban: <span class="font-bold">{{ $placedOrderNumber }}</span></p>
            </div>
        @endif

        <form wire:submit="placeOrder" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Ten doanh nghiep</label>
                    <input wire:model="companyName" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('companyName') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Ma so thue</label>
                    <input wire:model="taxCode" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('taxCode') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Nguoi lien he</label>
                    <input wire:model="customerName" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('customerName') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Chuc vu</label>
                    <input wire:model="contactPosition" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('contactPosition') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">So dien thoai</label>
                    <input wire:model="customerPhone" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('customerPhone') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Email</label>
                    <input wire:model="customerEmail" type="email" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('customerEmail') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Dia chi giao / xuat hoa don</label>
                    <input wire:model="shippingAddressLine1" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingAddressLine1') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Dia chi bo sung</label>
                    <input wire:model="shippingAddressLine2" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingAddressLine2') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Thanh pho</label>
                    <input wire:model="shippingCity" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingCity') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Tinh / Thanh</label>
                    <input wire:model="shippingProvince" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingProvince') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Ma buu chinh</label>
                    <input wire:model="shippingPostalCode" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingPostalCode') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Quoc gia</label>
                    <input wire:model="shippingCountry" type="text" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm" />
                    @error('shippingCountry') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Phuong thuc thanh toan uu tien</label>
                    <select wire:model="paymentMethod" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm">
                        <option value="cod">Cong no / thanh toan theo xac nhan don</option>
                        <option value="bank_transfer">Chuyen khoan ngan hang</option>
                    </select>
                    @error('paymentMethod') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs uppercase tracking-widest text-slate-500">Ghi chu don hang</label>
                    <textarea wire:model="notes" rows="3" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm"></textarea>
                    @error('notes') <p class="text-error text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="w-full md:w-auto rounded-full bg-primary px-8 py-4 font-semibold text-white shadow-lg shadow-primary/20 transition-colors hover:bg-blue-700"
            >
                <span wire:loading.remove wire:target="placeOrder">Gui yeu cau mua si</span>
                <span wire:loading wire:target="placeOrder">Dang xu ly...</span>
            </button>
        </form>
    </section>

    <aside class="w-full lg:w-[420px] rounded-[2rem] border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60 h-fit">
        <h2 class="font-headline text-2xl text-slate-950 mb-6">Danh sach san pham trong don</h2>

        @if(!$this->cart || $this->cart->items->isEmpty())
            <p class="text-slate-500">Don mua si cua ban dang trong.</p>
        @else
            <div class="space-y-5">
                @foreach($this->cart->items as $item)
                    <div class="flex items-start gap-4">
                        <img src="{{ $item->product?->image }}" alt="{{ $item->product?->name }}" class="h-16 w-16 rounded-2xl object-cover bg-slate-100" />
                        <div class="flex-1">
                            <p class="font-medium text-slate-900">{{ $item->product?->name }}</p>
                            <p class="text-sm text-slate-500">{{ number_format($item->price) }}đ / {{ $item->product?->unit ?: 'don vi' }}</p>
                            <div class="mt-2 inline-flex items-center gap-2">
                                <button type="button" wire:click="decrementQuantity({{ $item->id }})" class="h-8 w-8 rounded-full border border-slate-200 text-slate-700">-</button>
                                <span class="w-6 text-center">{{ $item->quantity }}</span>
                                <button type="button" wire:click="incrementQuantity({{ $item->id }})" class="h-8 w-8 rounded-full border border-slate-200 text-slate-700">+</button>
                            </div>
                        </div>
                        <button type="button" wire:click="removeItem({{ $item->id }})" class="text-sm text-slate-500 hover:text-red-500">Xoa</button>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 space-y-2 border-t border-slate-200 pt-6 text-sm text-slate-700">
                <div class="flex justify-between">
                    <span>Tam tinh</span>
                    <span>{{ number_format($this->subtotal) }}đ</span>
                </div>
                <div class="flex justify-between">
                    <span>Phi van chuyen</span>
                    <span>{{ number_format($shippingFee) }}đ</span>
                </div>
                <div class="flex justify-between">
                    <span>Giam gia</span>
                    <span>-{{ number_format($discountAmount) }}đ</span>
                </div>
                <div class="flex justify-between border-t border-slate-200 pt-3 text-base font-bold text-slate-950">
                    <span>Tong tam tinh</span>
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
