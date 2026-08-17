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
    public $status = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function cancelOrder($orderId)
    {
        $order = Order::where('id', $orderId)
                      ->where('user_id', Auth::id())
                      ->where('status', 'pending')
                      ->firstOrFail();

        $order->update(['status' => 'cancelled']);
        $this->dispatch('order-cancelled');
    }

public function confirmOrder($orderId)
    {
        $order = Order::where('id', $orderId)
                      ->where('user_id', Auth::id())
                      ->where('status', 'shipped')
                      ->firstOrFail();

        $order->update(['status' => 'completed']);
        $this->dispatch('order-confirmed');
    }

    public function render()
    {
        $orders = Order::with(['orderDetails.product', 'orderAddress', 'payments', 'shipping'])
            ->where('user_id', Auth::id())
            ->when($this->status, function ($query) {

                if ($this->status === 'shipped') {
                    $query->whereHas('shipping', function ($shipping) {
                        $shipping->where('status', 'shipped');
                    });

                } else {
                    $query->where('status', $this->status);
                }

            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {

                    $q->where('invoice_number', 'like', '%' . $this->search . '%')

                      ->orWhereHas('orderDetails.product', function ($product) {
                          $product->where('product_name', 'like', '%' . $this->search . '%');
                      })

                      ->orWhereHas('orderDetails.product.category', function ($category) {
                          $category->where('category', 'like', '%' . $this->search . '%');
                      });

                });
            })
            ->latest()
            ->paginate(10);

            $hasOrders = Order::where('user_id', Auth::id())->exists();

        return view('livewire.user.order.all-order', [
            'orders' => $orders,
            'hasOrders' => $hasOrders
        ]);
    }
}
