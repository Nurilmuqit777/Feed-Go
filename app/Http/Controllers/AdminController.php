<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
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

    public function getSalesData(Request $request)
    {
        $period = $request->get('period', 'monthly');

        if ($period === 'monthly') {
            return response()->json([
                'labels' => ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN'],
                'data' => [25000, 28000, 30000, 32000, 35000, 95000]
            ]);
        }

        if ($period === 'weekly') {
            return response()->json([
                'labels' => ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                'data' => [15000, 18000, 22000, 25000]
            ]);
        }

        if ($period === 'yearly') {
            return response()->json([
                'labels' => ['2020', '2021', '2022', '2023', '2024', '2025'],
                'data' => [200000, 250000, 300000, 350000, 400000, 450000]
            ]);
        }

        return response()->json([
            'labels' => [],
            'data' => []
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
