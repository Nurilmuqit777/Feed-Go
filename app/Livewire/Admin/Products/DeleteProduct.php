<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class DeleteProduct extends Component
{
    public $open = false;
    public $productId;
    public $product_name;

    protected $listeners = [
        'open-delete-product' => 'open',
    ];

    public function open($id)
    {
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->product_name = $product->product_name;

        $this->open = true;
    }

    public function delete()
    {
        $product = Product::findOrFail($this->productId);

        $imageFields = ['product_image1', 'product_image2', 'product_image3', 'product_image4'];

        foreach ($imageFields as $field) {
            if ($product->$field && Storage::disk('public')->exists($product->$field)) {
                Storage::disk('public')->delete($product->$field);
            }
        }

        $product->delete();

        session()->flash('success', 'Produk "' . $this->product_name . '" berhasil dihapus.');

        $this->dispatch('product-deleted');
        $this->dispatch(
            'show-toast',
            type: 'success',
            title: 'Produk Berhasil Dihapus',
            message: 'Produk berhasil dihapus dari daftar produk.'
        );
        $this->close();
    }

    public function close()
    {
        $this->reset(['productId', 'product_name']);
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.products.delete-product');
    }
}
