<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'amount', 'status', 'payment_method', 'transaction_id', 'paid_at', 'snap_token', 'payload'];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'payload' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
