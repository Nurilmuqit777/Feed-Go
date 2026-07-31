<?php

namespace App\Livewire\User\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public int $productId;

    public function mount(Product $product)
    {
        $this->productId = $product->id;
    }

    public function addToCart(int $quantity)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (! Auth::user()->role !== 'user') {
            session()->flash('error', 'Hanya pengguna dengan peran "user" yang dapat menambahkan produk ke keranjang.');
            return;
        }

        $product = Product::findOrFail($this->productId);

        $cart = Cart::firstOrNew([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        $currentQty = $cart->exists ? $cart->quantity : 0;

        if (($currentQty + $quantity) > $product->product_stock) {
            session()->flash('error', 'Jumlah produk di keranjang melebihi stok yang tersedia.');
            return;
        }

        $cart->quantity = $currentQty + $quantity;
        $cart->save();

        $this->dispatch('cart-updated');

        session()->flash('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function render()
    {
         return view('livewire.user.products.product-detail', [
        'product' => Product::with('category')->findOrFail($this->productId),
        ]);
    }
}
