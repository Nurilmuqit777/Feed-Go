<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class CustomerDetail extends Component
{
    use WithPagination;

    public int $id;
    public bool $showStatusModal = false;
    public string $statusAction = '';

    public function mount(int $id)
    {
        $this->id = $id;
    }
    
    public function openStatusModal(string $action)
    {
        $this->statusAction = $action;
        $this->showStatusModal = true;
    }

    public function closeStatusModal()
    {
        $this->showStatusModal = false;
        $this->statusAction = '';
    }

    public function changeStatus()
    {
        $user = User::where('role', 'user')
            ->findOrFail($this->id);

        if ($this->statusAction === 'deactivate') {
            $user->update([
                'status' => 'inactive',
            ]);
        }

        if ($this->statusAction === 'activate') {
            $user->update([
                'status' => 'active',
            ]);
        }

        $this->closeStatusModal();
    }

    public function render()
    {
        $user = User::with([
            'orders' => function ($query) {
                $query->latest();
            },
        ])
        ->where('role', 'user')
        ->findOrFail($this->id);

        $orders = $user->orders()
            ->latest()
            ->paginate(3);

        $totalOrders = $user->orders()->count();

        $completedOrders = $user->orders()
            ->where('status', 'completed')
            ->count();

        $processingOrders = $user->orders()
            ->whereIn('status', ['processing', 'delivered'])
            ->count();

        $totalSpent = $user->orders()
            ->whereIn('status', ['processing', 'delivered', 'completed'])
            ->sum('total_price');

        $lastOrder = $user->orders()
            ->latest()
            ->first();

        return view('livewire.admin.customer.customer-detail', [
            'user' => $user,
            'orders' => $orders,
            'totalOrders' => $totalOrders,
            'completedOrders' => $completedOrders,
            'processingOrders' => $processingOrders,
            'totalSpent' => $totalSpent,
            'lastOrder' => $lastOrder,
        ]);
    }
}
