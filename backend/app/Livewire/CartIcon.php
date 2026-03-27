<?php

namespace App\Livewire;

use App\Services\CartService;
use Livewire\Attributes\On;
use Livewire\Component;

class CartIcon extends Component
{
    public int $count = 0;

    public function mount(CartService $cartService): void
    {
        $this->count = $cartService->getItemCount();
    }

    #[On('cart-updated')]
    public function refreshCount(CartService $cartService): void
    {
        $this->count = $cartService->getItemCount();
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
