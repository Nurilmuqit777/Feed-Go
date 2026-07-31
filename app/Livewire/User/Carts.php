<?php

namespace App\Livewire\User;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Carts extends Component
{
    public function remove($id)
    {
        Cart::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail()
            ->delete();
    }

    public function increase($id)
    {
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        if ($cart->quantity < $cart->product->product_stock) {
            $cart->increment('quantity');
        }
    }

    public function decrease($id)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        if ($cart->quantity > 1) {
            $cart->decrement('quantity');
        }
    }

    public function render()
    {
        $carts = Cart::with('product.category')
            ->where('user_id', Auth::id())
            ->get();

        $subTotal = $carts->sum->total_discount_price;

        $originalTotal = $carts->sum->total_price;

        $discountAmount = $carts->sum->discount_amount;

        $totalItem = $carts->sum('quantity');

        return view('livewire.user.carts', compact(
            'carts',
            'subTotal',
            'originalTotal',
            'discountAmount',
            'totalItem'
        ));
    }
}
