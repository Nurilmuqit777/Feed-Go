<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $search = '';
    public $showResults = false;

    public function updatedSearch()
    {
        $this->showResults = strlen($this->search) > 0;
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->showResults = false;
    }

    public function render()
    {
        $results = collect();

        if (strlen($this->search) >= 2) {
            $results = Product::with('category')
                ->where(function($query) {
                    $query->where('product_name', 'like', '%' . $this->search . '%')
                          ->orWhere('product_description', 'like', '%' . $this->search . '%')
                          ->orWhereHas('category', function($q) {
                              $q->where('category', 'like', '%' . $this->search . '%');
                          });
                })
                ->latest()
                ->take(5)
                ->get();
        }

        return view('livewire.user.product-search', [
            'results' => $results
        ]);
    }
}
