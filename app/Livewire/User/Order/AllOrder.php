<?php

namespace App\Livewire\User\Order;

use Livewire\Component;
use App\Models\Order;


class AllOrder extends Component
{
    public $orders =[];
    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $orders = Order::with('orderItems.product')->latest();
        
        if ($this->search) {
            $orders->where(function($query) {
                $query->where('order_number', 'like', '%' . $this->search . '%')
                      ->orWhereHas('orderItems.product', function($q) {
                          $q->where('product_name', 'like', '%' . $this->search . '%');
                      });
            });
        }


        return view('livewire.user.order.all-order');
    }
}
