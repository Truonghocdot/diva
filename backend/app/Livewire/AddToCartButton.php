<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\CartService;
use InvalidArgumentException;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AddToCartButton extends Component
{
    public int $productId;

    public int $quantity = 1;

    public int $minQuantity = 1;

    public bool $showQuantityControls = false;

    public string $label = 'Add to Cart';

    public string $buttonClass = '';

    public bool $justAdded = false;

    public ?string $successMessage = null;

    public function mount(): void
    {
        $product = Product::find($this->productId);

        if (!$product) {
            return;
        }

        $this->minQuantity = max((int) ($product->min_order_quantity ?: 1), 1);
        $this->quantity = max($this->quantity, $this->minQuantity);
    }

    public function addToCart(CartService $cartService): void
    {
        $product = Product::find($this->productId);

        if (!$product) {
            throw ValidationException::withMessages([
                'product' => 'Sản phẩm không tồn tại.',
            ]);
        }

        try {
            $cartService->addProduct($product, $this->quantity);
        } catch (InvalidArgumentException $exception) {
            $this->justAdded = false;
            $this->successMessage = null;
            throw ValidationException::withMessages([
                'product' => $exception->getMessage(),
            ]);
        }

        $this->justAdded = true;
        $this->successMessage = 'Đã thêm ' . $this->quantity . ' sản phẩm vào giỏ hàng.';
        $this->dispatch('cart-updated');
    }

    public function increment(): void
    {
        $this->quantity++;
    }

    public function decrement(): void
    {
        if ($this->quantity <= $this->minQuantity) {
            return;
        }

        $this->quantity--;
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
