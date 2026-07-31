<?php

namespace App\Livewire\User\Order;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class AllOrder extends Component
{
    use WithPagination;

    public $search = '';

    public function updateSearch()
    {
        $this->resetPage();
    }

    public function cancelOrder($orderId)
    {
        $order = Order::where('id', $orderId)
                      ->where('user_id', Auth::id())
                      ->where('status', 'menunggu')
                      ->firstOrFail();
    
        $order->update(['status' => 'dibatalkan']);
        $this->dispatch('order-cancelled');
    }

public function confirmOrder($orderId)
    {
        $order = Order::where('id', $orderId)
                      ->where('user_id', Auth::id())
                      ->where('status', 'dikirim')
                      ->firstOrFail();

        $order->update(['status' => 'selesai']);
        $this->dispatch('order-confirmed');
    }

    public function render()
    {
        $orders = Order::with(['items.product', 'shipping'])
            ->where('user_id', Auth::id())
            ->when($this->search, function($query) {
                $query->where('order_number', 'like', '%' . $this->search . '%')
                      ->orWhereHas('items.product', function($q) {
                          $q->where('product_name', 'like', '%' . $this->search . '%');
                      });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.user.order.all-order', [
            'orders' => $orders
        ]);
    }
}
