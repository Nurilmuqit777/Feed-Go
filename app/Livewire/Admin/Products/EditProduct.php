<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;

    public $open = false;
    public $productId;

    public $product_name;
    public $product_description;
    public $product_weight;
    public $product_unit;
    public $product_price;
    public $product_discount_price;
    public $product_status;
    public $product_stock;
    public $category_id;
    public $product_images=[];
    public $imagesToDelete = [];
    public $new_image;
    public $categories;

    protected $listeners = [
        'open-edit-product' => 'open',
        'trix-updated-product_description' => 'setProductDescription',
    ];

    protected function rules()
    {
        return [
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'product_description' => 'required|string',

            'product_weight' => 'required|numeric|min:0',
            'product_unit' => 'required|string|max:10',

            'product_price' => 'required|numeric|min:0',
            'product_discount_price' => 'nullable|numeric|min:0|lt:product_price',

            'product_stock' => 'required|integer|min:0',
            'product_status' => 'required|in:available,unavailable',

            'product_images' => 'nullable|array|min:0|max:4',
            'new_image' => 'nullable|image|max:512',
        ];
    }

    public function setProductDescription($product_description)
    {
        $this->product_description = $product_description;
    }

    public function mount()
    {
        $this->refreshCategories();
    }

    public function refreshCategories()
    {
        $this->categories = ProductCategory::orderBy('category')->get();
    }

    public function open($id)
    {
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->product_name = $product->product_name;
        $this->product_description = $product->product_description;
        $this->product_weight = $product->product_weight;
        $this->product_unit = $product->product_unit;
        $this->product_price = $product->product_price;
        $this->product_discount_price = $product->product_discount_price;
        $this->product_stock = $product->product_stock;
        $this->product_status = $product->product_status;
        $this->category_id = $product->category_id;

        $this->product_images = collect([
            $product->product_image1,
            $product->product_image2,
            $product->product_image3,
            $product->product_image4,
        ])->filter()->values()->toArray();

        $this->open = true;
        $this->dispatch('trix-load', content: $this->product_description);
    }

    public function updatedNewImage()
    {
        if (!$this->new_image) return;

        if (count($this->product_images) >= 4) {
            $this->addError('product_images', 'Maksimal 4 gambar');
            $this->new_image = null;
            return;
        }

        $this->product_images[] = $this->new_image;
        $this->new_image = null;
    }

    public function removeImage($index)
    {
        $image = $this->product_images[$index] ?? null;

        if (is_string($image)) {
            $this->imagesToDelete[] = $image;
        }

        unset($this->product_images[$index]);
        $this->product_images = array_values($this->product_images);
    }


    public function save()
    {
        $this->validate();

        if (count($this->product_images) === 0) {
            $this->addError('product_images', 'Minimal 1 gambar');
            return;
        }

        foreach ($this->imagesToDelete as $oldImage) {
            if (Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        $discount = $this->product_discount_price === '' ? null : $this->product_discount_price;

            $data = [
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
            'product_weight' => $this->product_weight,
            'product_unit' => $this->product_unit,
            'product_price' => $this->product_price,
            'product_discount_price' => $discount,
            'product_stock' => $this->product_stock,
            'product_status' => $this->product_status,
            'category_id' => $this->category_id,

            'product_image1' => null,
            'product_image2' => null,
            'product_image3' => null,
            'product_image4' => null,
        ];

        foreach ($this->product_images as $index => $image) {
            if (is_string($image)) {
                $data['product_image'.($index+1)] = $image;
            } else {
                $data['product_image'.($index+1)] =
                    $image->store('products', 'public');
            }
        }
        Product::where('id', $this->productId)->update($data);

        $this->dispatch('product-updated');
        $this->close();
    }

    public function close()
    {
        $this->reset([
            'product_images',
            'new_image',
            'imagesToDelete',
            'product_name',
            'product_description',
            'product_weight',
            'product_unit',
            'product_price',
            'product_discount_price',
            'product_stock',
            'product_status',
            'category_id'
        ]);
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
