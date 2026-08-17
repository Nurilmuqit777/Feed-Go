<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Midtrans\Config;
use Midtrans\Notification;

class OrderController extends Controller
{
    public function index()
    {
        return view('layouts.order');
    }

    public function show($invoice)
    {
        $order = Order::with([
        'orderDetails.product.category',
        'orderAddress',
        'payments',
        'shipping'
        ])
        ->where('invoice_number', $invoice)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('layouts.order-detail', compact('order'));
    }

    public function notification(Request $request)
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        try {
            $notification = new Notification();

            $payment = Payment::with([
                'order.orderDetails.product'
                ])
                ->whereHas('order', function ($q) use ($notification) {
                $q->where('invoice_number', $notification->order_id);
                })
                ->first();

            if (!$payment) {
                return response()->json([
                    'message' => 'Payment not found'
                ], 404);
            }
            if ($payment->order->status === 'cancelled') {
                return response()->json([
                    'message' => 'Order already cancelled'
                ]);
            }

            $payment->payload = json_encode($request->all());

            $payment->transaction_id = $notification->transaction_id;
            $payment->payment_method = $notification->payment_type;
            switch ($notification->transaction_status) {
                case 'capture':
                    if ($notification->fraud_status == 'accept') {
                        $payment->status = 'paid';
                        $payment->paid_at = now();
                        $payment->order->update([
                            'status' => 'processing'
                        ]);
                        foreach ($payment->order->orderDetails as $detail) {
                            $detail->product->decrement(
                                'product_stock',
                                $detail->quantity_ordered
                            );
                        }
                        Cart::where('user_id', $payment->order->user_id)->delete();
                    }
                    break;
                case 'settlement':
                    if ($payment->status !== 'paid'){
                        $payment->status = 'paid';
                        $payment->paid_at = now();
                        $payment->order->update([
                            'status' => 'processing'
                        ]);
                        foreach ($payment->order->orderDetails as $detail) {
                            $detail->product->decrement(
                                'product_stock',
                                $detail->quantity_ordered
                            );
                        }
                        Cart::where('user_id', $payment->order->user_id)->delete();
                    }
                    break;
                case 'pending':
                    $payment->status = 'pending';
                    break;
                case 'expire':
                    $payment->status = 'expired';
                    $payment->order->update([
                        'status' => 'cancelled'
                    ]);
                    break;
                case 'cancel':
                    $payment->status = 'cancelled';
                    $payment->order->update([
                        'status' => 'cancelled'
                    ]);
                    break;
                case 'deny':
                case 'failure':
                    $payment->status = 'failed';
                    $payment->order->update([
                        'status' => 'cancelled'
                    ]);
                    break;
            }

            $payment->save();

            return response()->json([
                'message' => 'OK'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
