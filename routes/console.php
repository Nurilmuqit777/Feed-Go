<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Product;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $orderIds = Order::where('status', 'pending')
        ->whereNotNull('expired_at')
        ->where('expired_at', '<=', now())
        ->pluck('id');

    foreach ($orderIds as $orderId) {
        try {
            DB::transaction(function () use ($orderId) {
                $order = Order::whereKey($orderId)
                    ->lockForUpdate()
                    ->first();

                if (! $order) {
                return;
                }

                if ($order->status !== 'pending' ||! $order->expired_at ||$order->expired_at->isFuture()) {
                    return;
                }

                $payments = $order->payments()
                    ->lockForUpdate()
                    ->get();

                if ($payments->contains(fn ($payment) => $payment->status === 'paid')) {
                    Log::warning("Scheduler: Order #{$order->id} memiliki pembayaran paid; pembatalan dilewati.");

                    return;
                }

                $orderDetails = $order->orderDetails()->get();

                foreach ($orderDetails as $detail) {
                    $product = Product::whereKey($detail->product_id)
                        ->lockForUpdate()
                        ->firstOrFail();

                    $product->increment('product_stock',$detail->quantity_ordered);

                    Log::info("Scheduler: Stok produk #{$product->id} dikembalikan.",
                        [
                            'order_id' => $order->id,
                            'quantity_restored' => $detail->quantity_ordered,
                            'stock_after' => $product->fresh()->product_stock,
                        ]
                    );
                }

                $order->update(['status' => 'cancelled',]);

                $order->payments()
                    ->where('status', 'pending')
                    ->update(['status' => 'expired',]);

                Log::info("Scheduler: Order #{$order->id} ({$order->invoice_number}) dibatalkan karena expired.");
            });
        } catch (\Throwable $e) {
            Log::error("Scheduler: Gagal membatalkan order #{$orderId}.",['error' => $e->getMessage()]);
        }
    }
})->everySecond();

Schedule::command('app:prune-expired-cache')->hourly();
