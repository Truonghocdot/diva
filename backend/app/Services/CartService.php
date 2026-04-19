<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;

class CartService
{
    public function getOrCreateCart(): Cart
    {
        if (!session()->isStarted()) {
            session()->start();
        }

        $query = Cart::query();
        $userId = auth()->id();

        if ($userId) {
            $query->where('user_id', $userId);
        } else {
            $query->whereNull('user_id')
                ->where('session_id', session()->getId());
        }

        return $query->firstOrCreate([
            'user_id' => $userId,
            'session_id' => $userId ? null : session()->getId(),
        ], [
            'total' => 0,
        ]);
    }

    public function getCart(): ?Cart
    {
        if (!session()->isStarted()) {
            session()->start();
        }

        $query = Cart::with('items.product');
        $userId = auth()->id();

        if ($userId) {
            $query->where('user_id', $userId);
        } else {
            $query->whereNull('user_id')
                ->where('session_id', session()->getId());
        }

        return $query->first();
    }

    public function addProduct(Product $product, int $quantity = 1): CartItem
    {
        $minimumQuantity = max((int) ($product->min_order_quantity ?: 1), 1);

        if ($quantity < $minimumQuantity) {
            throw new InvalidArgumentException('So luong toi thieu cho san pham nay la ' . $minimumQuantity . '.');
        }

        if ($product->stock < $quantity) {
            throw new InvalidArgumentException('Sản phẩm không đủ tồn kho.');
        }

        $cart = $this->getOrCreateCart();
        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $quantity;

            if ($newQuantity > $product->stock) {
                throw new InvalidArgumentException('Số lượng vượt quá tồn kho hiện tại.');
            }

            $cartItem->update([
                'quantity' => $newQuantity,
                'price' => $product->sale_price ?: $product->price,
            ]);
        } else {
            $cartItem = $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->sale_price ?: $product->price,
            ]);
        }

        $this->recalculateCartTotal($cart);

        return $cartItem;
    }

    public function updateQuantity(CartItem $item, int $quantity): void
    {
        $product = $item->product;

        if (!$product) {
            throw new InvalidArgumentException('Sản phẩm không tồn tại.');
        }

        $minimumQuantity = max((int) ($product->min_order_quantity ?: 1), 1);

        if ($quantity < $minimumQuantity) {
            throw new InvalidArgumentException('So luong toi thieu cho san pham nay la ' . $minimumQuantity . '.');
        }

        if ($quantity > $product->stock) {
            throw new InvalidArgumentException('Số lượng vượt quá tồn kho hiện tại.');
        }

        $item->update([
            'quantity' => $quantity,
            'price' => $product->sale_price ?: $product->price,
        ]);

        $this->recalculateCartTotal($item->cart);
    }

    public function removeItem(CartItem $item): void
    {
        $cart = $item->cart;
        $item->delete();
        $this->recalculateCartTotal($cart);
    }

    public function clearCart(Cart $cart): void
    {
        $cart->items()->delete();
        $cart->update(['total' => 0]);
    }

    public function getItemCount(): int
    {
        $cart = $this->getCart();

        if (!$cart) {
            return 0;
        }

        return (int) $cart->items->sum('quantity');
    }

    public function getCartItems(Cart $cart): Collection
    {
        return $cart->items()->with('product')->get();
    }

    public function recalculateCartTotal(Cart $cart): void
    {
        $cart->load('items');

        $total = $cart->items->sum(function (CartItem $item) {
            return $item->quantity * $item->price;
        });

        $cart->update(['total' => $total]);
    }
}
