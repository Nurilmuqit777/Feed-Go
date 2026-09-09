<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\ProductCategory;

class AddProductCategory extends Component
{
    public $open = false;
    public $category = '';
    public $categories =[];

    public $categoryToDelete = null;

    protected $listeners = [
        'open-add-product-category' => 'open',
        'close-category-modal' => 'close',
    ];

    protected $rules = [
        'category' => 'required|string|max:255|unique:product_categories,category',
    ];

    public function open()
    {
        $this->dispatch('close-product-modal')
            ->to('admin.products.add-product');

        $this->loadCategories();
        $this->open = true;
    }

    public function loadCategories()
    {
        $this->categories = ProductCategory::orderBy('category')->get();
    }

    public function close()
    {
        $this->reset();
        $this->open = false;
    }

    public function save()
    {
        $this->validate();

        ProductCategory::create([
            'category' => strtoupper($this->category),
        ]);

        $this->dispatch('product-category-added');

        $this->reset('category');

        $this->loadCategories();
    }

    public function confirmDelete($id)
    {
        $this->categoryToDelete = $id;
    }

    public function cancelDelete()
    {
        $this->categoryToDelete = null;
    }

    public function deleteCategory()
    {
        if (!$this->categoryToDelete) {
            return;
        }

        $category = ProductCategory::find($this->categoryToDelete);

        if ($category) {
            $category->delete();
        }

        $this->categoryToDelete = null;

        $this->loadCategories();

        $this->dispatch('product-category-added');
    }

    public function render()
    {
        return view('livewire.admin.products.add-product-category');
    }
}
