<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Order;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {

    Order::with('payments')
        ->where('status', 'pending')
        ->where('expired_at', '<=', now())
        ->each(function ($order) {

            $order->update([
                'status' => 'cancelled',
            ]);

            if ($order->payments) {
                $order->payments->update([
                    'status' => 'expired',
                ]);
            }

        });

})->everyMinute();
