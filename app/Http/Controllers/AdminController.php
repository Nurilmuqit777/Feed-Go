<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{

    public function index()
    {
        $now = Carbon::now();
        $totalOrders = Order::count();

        $startOfThisMonth = $now->copy()->startOfMonth();
        $endOfThisMonth = $now->copy()->endOfMonth();

        $startOfLastMonth = $now->copy()->subMonth()->startOfMonth();
        $endOfLastMonth = $now->copy()->subMonth()->endOfMonth();

        $thisMonthOrders = Order::whereBetween('created_at', [
            $startOfThisMonth,
            $endOfThisMonth,
        ])->count();

        $lastMonthOrders = Order::whereBetween('created_at', [
            $startOfLastMonth,
            $endOfLastMonth,
        ])->count();


        $activeStatuses = [
            'processing',
            'delivered',
        ];

        $activeOrders = Order::whereIn('status', $activeStatuses)->count();

        $thisMonthActiveOrders = Order::whereIn('status', $activeStatuses)
            ->whereBetween('created_at', [
                $startOfThisMonth,
                $endOfThisMonth,
            ])
            ->count();

        $lastMonthActiveOrders = Order::whereIn('status', $activeStatuses)
            ->whereBetween('created_at', [
                $startOfLastMonth,
                $endOfLastMonth,
            ])
            ->count();

        $shippedOrders = Order::where('status', 'completed')->count();

        $thisMonthShippedOrders = Order::where('status', 'completed')
            ->whereBetween('created_at', [
                $startOfThisMonth,
                $endOfThisMonth,
            ])
            ->count();

        $lastMonthShippedOrders = Order::where('status', 'completed')
            ->whereBetween('created_at', [
                $startOfLastMonth,
                $endOfLastMonth,
            ])
            ->count();

        $totalOrdersPercentage = $this->calculatePercentage(
            $thisMonthOrders,
            $lastMonthOrders
        );

        $activeOrdersPercentage = $this->calculatePercentage(
            $thisMonthActiveOrders,
            $lastMonthActiveOrders
        );

        $shippedOrdersPercentage = $this->calculatePercentage(
            $thisMonthShippedOrders,
            $lastMonthShippedOrders
        );

        $bestSellingProducts = OrderDetail::query()
            ->select('product_id')
            ->selectRaw('SUM(quantity_ordered) as total_sold')
            ->whereHas('order', function ($query) {
                $query->whereIn('status', [
                    'processing',
                    'delivered',
                    'completed',
                ]);
            })
            ->whereNotNull('product_id')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->take(2)
            ->get();

        $recentOrders = Order::with([
            'user',
            'orderDetails.product',
        ])
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'activeOrders',
            'shippedOrders',
            'recentOrders',
            'bestSellingProducts',

            'totalOrdersPercentage',
            'activeOrdersPercentage',
            'shippedOrdersPercentage',
        ));
    }

    private function calculatePercentage(
        int $current,
        int $previous
    ): float {
        if ($previous === 0 && $current === 0) {
            return 0;
        }
        if ($previous === 0) {
            return 100;
        }
        return round(
            (($current - $previous) / $previous) * 100,
            1
        );
    }

    public function product()
    {
        return view('admin.product');
    }

    public function order()
    {
        return view('admin.order');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function delivery()
    {
        return view('admin.delivery');
    }

    public function report()
    {
        return view('admin.report');
    }

    public function article()
    {
        return view('admin.article');
    }

    public function orderDetail(string $invoice)
    {
        $order = Order::with([
            'orderDetails.product.category',
            'orderAddress',
            'payments',
        ])
        ->where('invoice_number', $invoice)
        ->firstOrFail();
        return view('admin.order.order-detail', compact('order'));
    }

    public function orderShipping(string $invoice_number)
    {
        return view('admin.order.order-detail-shipping', [
            'invoice_number' => $invoice_number,
        ]);
    }

    public function reportDetail(string $invoice_number)
    {
        $order = Order::with([
            'orderDetails.product.category',
            'orderAddress.shipping',
            'payments',
        ])
        ->where('invoice_number', $invoice_number)
        ->firstOrFail();
        return view('admin.report-detail', [
            'invoice_number' => $invoice_number,
            'order' => $order,
        ]);
    }

    public function customerDetail(int $id)
    {
        return view ('admin.customer-detail', [
            'id' => $id,
        ]);
    }

    public function getSalesData(Request $request): JsonResponse
    {
        $period = request('period', 'monthly');

        $validStatuses = [
            'processing',
            'delivered',
            'completed',
        ];

        $now = Carbon::now();

        if ($period === 'weekly') {
            return $this->weeklySales($now, $validStatuses);
        }

        if ($period === 'yearly') {
            return $this->yearlySales($now, $validStatuses);
        }

        return $this->monthlySales($now, $validStatuses);
    }

    private function weeklySales(Carbon $now, array $validStatuses): JsonResponse
    {
        $startDate = $now->copy()->subDays(6)->startOfDay();
        $endDate = $now->copy()->endOfDay();

        $sales = OrderDetail::query()
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->whereIn('orders.status', $validStatuses)
            ->whereBetween('orders.created_at', [
                $startDate,
                $endDate,
            ])
            ->selectRaw(
                'DATE(orders.created_at) as date,
                 SUM(order_details.sub_total) as total'
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $data = [];

        for ($i = 0; $i < 7; $i++) {
            $date = $startDate->copy()->addDays($i);
            $key = $date->format('Y-m-d');

            $labels[] = $date->translatedFormat('D, d M');

            $data[] = (float) ($sales[$key]->total ?? 0);
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    private function monthlySales(Carbon $now, array $validStatuses): JsonResponse
    {
        $startDate = $now->copy()->subDays(29)->startOfDay();
        $endDate = $now->copy()->endOfDay();

        $sales = OrderDetail::query()
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->whereIn('orders.status', $validStatuses)
            ->whereBetween('orders.created_at', [
                $startDate,
                $endDate,
            ])
            ->selectRaw(
                'DATE(orders.created_at) as date,
                 SUM(order_details.sub_total) as total'
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $date = $startDate->copy()->addDays($i);
            $key = $date->format('Y-m-d');

            $labels[] = $date->format('d M');

            $data[] = (float) ($sales[$key]->total ?? 0);
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    private function yearlySales(Carbon $now, array $validStatuses): JsonResponse
    {
        $startDate = $now->copy()->subMonths(11)->startOfMonth();
        $endDate = $now->copy()->endOfMonth();

        $sales = OrderDetail::query()
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->whereIn('orders.status', $validStatuses)
            ->whereBetween('orders.created_at', [
                $startDate,
                $endDate,
            ])
            ->selectRaw(
                'YEAR(orders.created_at) as year,
                 MONTH(orders.created_at) as month,
                 SUM(order_details.sub_total) as total'
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $sales = $sales->keyBy(function ($item) {
            return sprintf(
                '%04d-%02d',
                $item->year,
                $item->month
            );
        });

        $labels = [];
        $data = [];

        for ($i = 0; $i < 12; $i++) {
            $date = $startDate->copy()->addMonths($i);

            $key = $date->format('Y-m');

            $labels[] = $date->translatedFormat('M Y');

            $data[] = (float) ($sales[$key]->total ?? 0);
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
