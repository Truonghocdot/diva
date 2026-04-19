<?php

namespace App\Livewire;

use App\Models\CartItem;
use App\Models\Order;
use App\Services\CartService;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class CheckoutForm extends Component
{
    public string $companyName = '';

    public string $customerName = '';

    public string $contactPosition = '';

    public string $customerEmail = '';

    public string $customerPhone = '';

    public string $taxCode = '';

    public string $shippingAddressLine1 = '';

    public string $shippingAddressLine2 = '';

    public string $shippingCity = '';

    public string $shippingProvince = '';

    public string $shippingPostalCode = '';

    public string $shippingCountry = 'Vietnam';

    public string $paymentMethod = 'cod';

    public string $notes = '';

    public float $shippingFee = 30000;

    public float $discountAmount = 0;

    public ?string $placedOrderNumber = null;

    public function mount(): void
    {
        if (auth()->check()) {
            $this->customerName = auth()->user()->name ?? '';
            $this->customerEmail = auth()->user()->email ?? '';
        }
    }

    protected function rules(): array
    {
        return [
            'companyName' => ['nullable', 'string', 'max:255'],
            'customerName' => ['required', 'string', 'max:255'],
            'contactPosition' => ['nullable', 'string', 'max:255'],
            'customerEmail' => ['required', 'email', 'max:255'],
            'customerPhone' => ['required', 'string', 'max:30'],
            'taxCode' => ['nullable', 'string', 'max:50'],
            'shippingAddressLine1' => ['required', 'string', 'max:255'],
            'shippingAddressLine2' => ['nullable', 'string', 'max:255'],
            'shippingCity' => ['required', 'string', 'max:120'],
            'shippingProvince' => ['nullable', 'string', 'max:120'],
            'shippingPostalCode' => ['nullable', 'string', 'max:20'],
            'shippingCountry' => ['required', 'string', 'max:120'],
            'paymentMethod' => ['required', 'in:cod,bank_transfer'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function getCartProperty()
    {
        return app(CartService::class)->getCart();
    }

    public function getSubtotalProperty(): float
    {
        $cart = $this->cart;

        if (!$cart) {
            return 0;
        }

        return (float) $cart->items->sum(fn (CartItem $item) => $item->quantity * $item->price);
    }

    public function getTotalProperty(): float
    {
        return max($this->subtotal + $this->shippingFee - $this->discountAmount, 0);
    }

    #[On('cart-updated')]
    public function refreshCart(): void
    {
        // No-op: triggers component re-render.
    }

    public function incrementQuantity(int $itemId, CartService $cartService): void
    {
        $item = $this->findCartItem($itemId);

        if (!$item) {
            return;
        }

        try {
            $cartService->updateQuantity($item, $item->quantity + 1);
        } catch (InvalidArgumentException $exception) {
            $this->addError('cart', $exception->getMessage());
        }

        $this->dispatch('cart-updated');
    }

    public function decrementQuantity(int $itemId, CartService $cartService): void
    {
        $item = $this->findCartItem($itemId);

        if (!$item) {
            return;
        }

        try {
            $cartService->updateQuantity($item, $item->quantity - 1);
        } catch (InvalidArgumentException $exception) {
            $this->addError('cart', $exception->getMessage());
        }

        $this->dispatch('cart-updated');
    }

    public function removeItem(int $itemId, CartService $cartService): void
    {
        $item = $this->findCartItem($itemId);

        if (!$item) {
            return;
        }

        $cartService->removeItem($item);
        $this->dispatch('cart-updated');
    }

    public function placeOrder(CartService $cartService): void
    {
        $validated = $this->validate();
        $cart = $cartService->getCart();

        if (!$cart || $cart->items->isEmpty()) {
            throw ValidationException::withMessages([
                'cart' => 'Giỏ hàng đang trống.',
            ]);
        }

        $order = DB::transaction(function () use ($cart, $validated, $cartService) {
            $cart->load('items.product');

            foreach ($cart->items as $item) {
                if (!$item->product) {
                    throw ValidationException::withMessages([
                        'cart' => 'Một số sản phẩm đã bị xóa khỏi hệ thống.',
                    ]);
                }

                if ($item->quantity > $item->product->stock) {
                    throw ValidationException::withMessages([
                        'cart' => 'Sản phẩm "' . $item->product->name . '" không đủ tồn kho.',
                    ]);
                }
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'cart_id' => $cart->id,
                'order_number' => $this->generateOrderNumber(),
                'company_name' => $validated['companyName'] ?: null,
                'customer_name' => $validated['customerName'],
                'contact_position' => $validated['contactPosition'] ?: null,
                'customer_email' => $validated['customerEmail'],
                'customer_phone' => $validated['customerPhone'],
                'tax_code' => $validated['taxCode'] ?: null,
                'shipping_address_line1' => $validated['shippingAddressLine1'],
                'shipping_address_line2' => $validated['shippingAddressLine2'] ?: null,
                'shipping_city' => $validated['shippingCity'],
                'shipping_province' => $validated['shippingProvince'] ?: null,
                'shipping_postal_code' => $validated['shippingPostalCode'] ?: null,
                'shipping_country' => $validated['shippingCountry'],
                'subtotal' => $this->subtotal,
                'shipping_fee' => $this->shippingFee,
                'discount_amount' => $this->discountAmount,
                'total_amount' => $this->total,
                'payment_method' => $validated['paymentMethod'],
                'payment_status' => 'pending',
                'status' => 'pending',
                'placed_at' => now(),
                'notes' => $validated['notes'] ?: null,
            ]);

            foreach ($cart->items as $item) {
                $product = $item->product;

                $order->items()->create([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_slug' => $product->slug,
                    'unit_price' => $item->price,
                    'quantity' => $item->quantity,
                    'total_price' => $item->price * $item->quantity,
                    'scent_notes' => [
                        'top' => $product->scent_top_notes,
                        'middle' => $product->scent_middle_notes,
                        'base' => $product->scent_base_notes,
                    ],
                ]);

                $product->decrement('stock', $item->quantity);
            }

            $cartService->clearCart($cart);

            return $order;
        });

        $this->placedOrderNumber = $order->order_number;
        $this->dispatch('cart-updated');
        $this->dispatch('order-placed', orderNumber: $order->order_number, totalAmount: (float) $order->total_amount);
    }

    public function render()
    {
        return view('livewire.checkout-form');
    }

    private function findCartItem(int $itemId): ?CartItem
    {
        $cart = $this->cart;

        if (!$cart) {
            return null;
        }

        return $cart->items()->whereKey($itemId)->with('product')->first();
    }

    private function generateOrderNumber(): string
    {
        do {
            $orderNumber = 'ORD-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));
        } while (Order::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }
}
