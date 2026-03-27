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

    public string $label = 'Add to Cart';

    public string $buttonClass = '';

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
            throw ValidationException::withMessages([
                'product' => $exception->getMessage(),
            ]);
        }

        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
