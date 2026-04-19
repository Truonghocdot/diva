<div class="space-y-3">
    @if($showQuantityControls)
        <div class="inline-flex items-center gap-2">
            <button
                type="button"
                wire:click="decrement"
                class="w-9 h-9 rounded-lg border border-outline-variant/40 text-on-surface hover:bg-surface-container-low transition-colors"
            >-</button>
            <span class="w-8 text-center font-medium">{{ $quantity }}</span>
            <button
                type="button"
                wire:click="increment"
                class="w-9 h-9 rounded-lg border border-outline-variant/40 text-on-surface hover:bg-surface-container-low transition-colors"
            >+</button>
        </div>
        <p class="text-xs text-slate-500">MOQ: {{ number_format($minQuantity) }}</p>
    @endif

    <button
        type="button"
        wire:click.stop="addToCart"
        wire:loading.attr="disabled"
        class="{{ $buttonClass }}"
    >
        <span wire:loading.remove wire:target="addToCart">{{ $label }}</span>
        <span wire:loading wire:target="addToCart">Đang thêm...</span>
    </button>

    @if($justAdded && $successMessage)
        <p class="text-xs text-primary">{{ $successMessage }}</p>
    @endif
</div>
@error('product')
    <p class="text-error text-xs mt-2">{{ $message }}</p>
@enderror
