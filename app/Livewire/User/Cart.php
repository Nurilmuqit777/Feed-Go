<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Cart as CartModel;

class Cart extends Component
{

    public function addToCart($productId)
    {
        $cart = CartModel::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $productId,
            ],
            [
                'quantity' => 1,
            ]
        );

        if (! $cart->wasRecentlyCreated) {
            $cart->increment('quantity');
        }
    }

    public function removeCart($id)
    {
        CartModel::where('user_id', auth()->id())
            ->where('id', $id)
            ->delete();
    }

    public function increaseQty($id)
    {
        $cart = CartModel::where('user_id', auth()->id())
            ->findOrFail($id);

        $cart->increment('quantity');
    }

    public function decreaseQty($id)
    {
        $cart = CartModel::where('user_id', auth()->id())
            ->findOrFail($id);

        if ($cart->quantity > 1) {
            $cart->decrement('quantity');
        } else {
            $cart->delete();
        }
    }

    public function render()
    {
        $carts = CartModel::with('product')
        ->where('user_id', auth()->id())
        ->get();

        $total = $carts->sum(fn($cart) => $cart->subtotal);

        return view('livewire.user.cart', [
            'carts' => $carts,
            'total' => $total,
        ])->layout('layouts.app');
    }
}
