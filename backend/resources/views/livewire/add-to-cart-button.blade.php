<button
    type="button"
    wire:click.stop="addToCart"
    wire:loading.attr="disabled"
    class="{{ $buttonClass }}"
>
    <span wire:loading.remove wire:target="addToCart">{{ $label }}</span>
    <span wire:loading wire:target="addToCart">Đang thêm...</span>
</button>
@error('product')
    <p class="text-error text-xs mt-2">{{ $message }}</p>
@enderror
