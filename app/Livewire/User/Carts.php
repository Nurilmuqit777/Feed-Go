<?php

namespace App\Livewire\User;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Carts extends Component
{
    public ?int $cartToDelete = null;

    public bool $showDeleteModal = false;

    public function confirmDelete(int $id)
    {
        $this->cartToDelete = $id;
        $this->showDeleteModal = true;
    }

    public function remove()
    {
        Cart::where('user_id', Auth::id())
            ->where('id', $this->cartToDelete)
            ->firstOrFail()
            ->delete();

        $this->showDeleteModal = false;
        $this->cartToDelete = null;

        $this->dispatch('cart-updated');

        $this->dispatch('toast', [
        'type' => 'success',
        'title' => 'Berhasil',
        'message' => 'Produk berhasil dihapus dari keranjang.'
        ]);

    }

    public function increase(int $id)
    {
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        if ($cart->quantity >= $cart->product->product_stock) {

            $this->dispatch('toast', [
                'type' => 'error',
                'title' => 'Stok Tidak Cukup',
                'message' => 'Jumlah produk sudah mencapai batas stok.'
            ]);

            return;
        }

        $cart->increment('quantity');

    }

    public function decrease(int $id)
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
