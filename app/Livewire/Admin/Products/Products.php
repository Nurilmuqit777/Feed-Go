<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'product_name';
    public $sortDirection = 'asc';

    protected $paginationTheme = 'tailwind';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'product_name'],
        'sortDirection' => ['except' => 'asc'],
    ];

    protected $listeners = [
        'product-added' => '$refresh',
        'product-updated' => '$refresh',
        'product-deleted' => '$refresh',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function toggleSortDirection()
    {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    public function getProductsProperty()
    {
        return Product::with('category')
            ->where(function ($q) {
                $q->where('product_name', 'like', '%' . $this->search . '%')
                  ->orWhere('product_description', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.products.products', [
            'products' => $this->products
        ]);
    }
}
