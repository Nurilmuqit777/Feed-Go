<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class AddProduct extends Component
{
    use WithFileUploads;

    public $open = false;
    public $product_name;
    public $product_description;
    public $product_weight;
    public $product_unit;
    public $product_discount_price;
    public $product_status;
    public $product_price;
    public $product_stock;
    public $product_image;
    public $category_id;

    public $product_images = [];
    public $new_image;
    public $categories;

    protected $listeners = [
        'open-add-product' => 'open',
        'close-product-modal' => 'close',
        'trix-updated-product_description' => 'setProductDescription',
        'product-category-added' => 'refreshCategories',
    ];

    protected $rules = [
        'product_name' => 'required|string|max:255',
        'category_id' => 'required|exists:product_categories,id',
        'product_description' => 'required|string',

        'product_weight' => 'required|numeric|min:0',
        'product_unit' => 'required|string|max:10',

        'product_price' => 'required|numeric|min:0',
        'product_discount_price' => 'nullable|numeric|min:0|lt:product_price',

        'product_stock' => 'required|integer|min:0',
        'product_status' => 'required|in:available,unavailable',

        'product_images' => 'required|array|min:1|max:4',
        'product_images.*' => 'image|max:512',
        'new_image' => 'nullable|image|max:512',
    ];

    public function setProductDescription($product_description)
    {
        $this->product_description = $product_description;
    }

    public function mount()
    {
        $this->categories= ProductCategory::orderBy('category')->get();
    }

    public function refreshCategories()
    {
        $this->categories = ProductCategory::orderBy('category')->get();
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
        unset($this->product_images[$index]);
        $this->product_images = array_values($this->product_images);
    }

    public function save()
    {
        $this->validate();

        if (count($this->product_images) === 0) {
        $this->addError('product_images', 'Minimal 1 gambar produk');
        return;
        }

        $productDiscount = $this->product_discount_price;
        if ($productDiscount === '' || $productDiscount === null) {
            $productDiscount = null;
        }


        $data = [
            'product_name' => $this->product_name,
            'category_id' => $this->category_id,
            'product_description' => $this->product_description,
            'product_weight' => $this->product_weight,
            'product_unit' => $this->product_unit,
            'product_price' => $this->product_price,
            'product_discount_price' => $productDiscount,
            'product_stock' => $this->product_stock,
            'product_status' => $this->product_status,
            'product_slug' => Str::slug($this->product_name . '-' . Str::random(6)),
        ];

        foreach ($this->product_images as $index => $image) {
            if ($index < 4) {
                $data['product_image' . ($index + 1)] =
                    $image->store('products', 'public');
            }
        }

        Product::create($data);

        $this->dispatch('product-added');
        $this->dispatch(
            'show-toast',
            type: 'success',
            title: 'Produk Berhasil Ditambahkan',
            message: 'Produk berhasil ditambahkan ke daftar produk.'
        );

        $this->resetForm();
        $this->close();
    }

    public function resetForm()
    {
        $this->reset([
            'product_name',
            'product_description',
            'product_weight',
            'product_unit',
            'product_price',
            'product_discount_price',
            'product_stock',
            'product_status',
            'product_images',
            'category_id'
        ]);
    }

    public function open()
    {
        $this->dispatch('close-category-modal')->to('admin.products.add-product-category');
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.admin.products.add-product');
    }
}
