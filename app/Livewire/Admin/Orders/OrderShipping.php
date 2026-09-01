<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Shipping;
use Livewire\Component;
use Livewire\WithPagination;

class OrderShipping extends Component
{
    use WithPagination;

    public $search = '';
    public $filterStatus = '';
    public $filterCourier = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $startDate = '';
    public $endDate = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterStatus' => ['except' => ''],
        'filterCourier' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'startDate' => ['except' => ''],
        'endDate' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function updatingFilterCourier()
    {
        $this->resetPage();
    }

    public function updatingStartDate()
    {
        $this->resetPage();
    }

    public function updatingEndDate()
    {
        $this->resetPage();
    }

    public function sortByColumn(string $column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'desc';
        }
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'filterStatus', 'startDate', 'endDate', 'filterCourier']);
        $this->sortBy = 'created_at';
        $this->sortDirection = 'desc';
        $this->resetPage();
    }

    public function render()
    {
        $shippings = Shipping::query()
            ->with('orderAddress.order')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('tracking_number', 'like', '%' . $this->search . '%')
                      ->orWhereHas('orderAddress', function ($q) {
                          $q->where('recipient_name', 'like', '%' . $this->search . '%');
                      })
                      ->orWhereHas('orderAddress.order', function ($q) {
                          $q->where('invoice_number', 'like', '%' . $this->search . '%');
                      });
                });
            })

            ->when($this->filterCourier, function ($query) {
                $query->where('courier', $this->filterCourier);
            })

            ->when($this->filterStatus, function ($query) {
                $query->where('status', $this->filterStatus);
            })

            ->when($this->startDate, function ($query) {
                $query->whereDate('created_at', '>=', $this->startDate);
            })

            ->when($this->endDate, function ($query) {
                $query->whereDate('created_at', '<=', $this->endDate);
            })

            ->orderBy($this->sortBy, $this->sortDirection)

            ->paginate(10);
        return view('livewire.admin.orders.order-shipping', [
            'shippings' => $shippings
        ]);
    }
}
