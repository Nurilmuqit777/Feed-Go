<?php

namespace App\Livewire\Admin\Orders;

use Livewire\Component;

class ChangeShippingStatus extends Component
{
    public $open = false;
    public $tracking_number ='';

    protected $listeners = [
        'open-change-shipping-status' => 'open',
        'close-shipping-status-modal' => 'close',
    ];

    protected $rules = [
        'tracking_number' => 'required|string|max:255|unique:blog_categories,category',
    ];

    public function render()
    {
        return view('livewire.admin.orders.change-shipping-status');
    }
}
