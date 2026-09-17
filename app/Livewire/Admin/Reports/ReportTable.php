<?php

namespace App\Livewire\Admin\Reports;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Payment;
use App\Models\Order;
use Carbon\Carbon;

class ReportTable extends Component
{
    use withPagination;
    public string $search = '';
    public string $paymentMethod = '';
    public string $status = '';
    public string $dateFrom = '';
    public string $dateTo = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedPaymentMethod(): void
    {
        $this->resetPage();
    }

    public function updatedStatus(): void
    {
        $this->resetPage();
    }

    public function updatedDateFrom(): void
    {
        $this->resetPage();
    }

    public function updatedDateTo(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->reset([
            'search',
            'paymentMethod',
            'status',
            'dateFrom',
            'dateTo',
        ]);

        $this->resetPage();
    }

    private function reportQuery()
    {
        return Payment::query()
            ->with([
                'order.user',
            ])

            ->when($this->search, function ($query) {
                $search = trim($this->search);

                $query->where(function ($q) use ($search) {

                    $q->whereHas('order', function ($orderQuery) use ($search) {
                        $orderQuery->where(
                            'invoice_number',
                            'like',
                            '%' . $search . '%'
                        );
                    });

                    $q->orWhereHas('order.user', function ($userQuery) use ($search) {
                        $userQuery->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        );
                    });
                });
            })

            ->when($this->paymentMethod, function ($query) {
                $query->where(
                    'payment_method',
                    $this->paymentMethod
                );
            })

            ->when($this->status, function ($query) {
                $query->where(
                    'status',
                    $this->status
                );
            })

            ->when($this->dateFrom, function ($query) {
                $query->whereDate(
                    'paid_at',
                    '>=',
                    $this->dateFrom
                );
            })

            ->when($this->dateTo, function ($query) {
                $query->whereDate(
                    'paid_at',
                    '<=',
                    $this->dateTo
                );
            })

            ->orderByDesc('paid_at')
            ->orderByDesc('created_at');
    }

    private function getStatistics(): array
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        return [
            'ordersThisMonth' => Order::query()
                ->whereBetween('created_at', [
                    $startOfMonth,
                    $endOfMonth,
                ])
                ->count(),

            'verifiedPayments' => Payment::query()
                ->where('status', 'paid')
                ->count(),

            'ordersShipped' => Order::query()
                ->where('status', 'delivered')
                ->count(),

            'newOrdersThisWeek' => Order::query()
                ->whereBetween('created_at', [
                    $startOfWeek,
                    $endOfWeek,
                ])
                ->count(),

            'pendingPayments' => Payment::query()
                ->where('status', 'pending')
                ->count(),
        ];
    }

    public function render()
    {
        $payments = $this->reportQuery()
            ->paginate(10);

        $statistics = $this->getStatistics();

        $paymentMethods = Payment::query()
            ->whereNotNull('payment_method')
            ->where('payment_method', '!=', '')
            ->distinct()
            ->orderBy('payment_method')
            ->pluck('payment_method');

        return view('livewire.admin.reports.report-table', [
            'payments' => $payments,
            'paymentMethods' => $paymentMethods,
            'statistics' => $statistics,
        ]);
    }
}
