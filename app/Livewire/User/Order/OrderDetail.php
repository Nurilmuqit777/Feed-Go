<?php

namespace App\Livewire\User\Order;

use Livewire\Component;
use App\Models\Order;

class OrderDetail extends Component
{
    public Order $order;

    public array $steps =[
        'pending' => 'Menunggu Pembayaran',
        'processing' => 'Pesanan Diproses',
        'delivered' => 'Pesanan Dikirim',
        'completed' => 'Pesanan Selesai',
    ];

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.user.order.order-detail');
    }
}
