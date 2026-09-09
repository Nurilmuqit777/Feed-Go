<?php

namespace App\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Shipping;

class OrderShippingDetail extends Component
{
    public $invoiceNumber;

    protected $listeners = [
        'shipping-status-changed' => '$refresh',
    ];

    public function mount($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    public function render()
    {
        $shipping = Shipping::with('orderAddress.order')
            ->whereHas('orderAddress.order', function ($query) {
                $query->where('invoice_number', $this->invoiceNumber);
            })
            ->firstOrFail();

        return view('livewire.admin.orders.order-shipping-detail', [
            'shipping' => $shipping,
        ]);
    }
}
