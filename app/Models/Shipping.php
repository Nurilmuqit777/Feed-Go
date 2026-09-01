<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'order_address_id',
        'courier',
        'service',
        'cost',
        'tracking_number',
        'estimate',
        'shipped_at',
        'status'
    ];

    public function orderAddress()
    {
        return $this ->belongsTo(OrderAddress::class);
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'submitted' => 'Menunggu',
            'picked_up' => 'Diproses',
            'shipped' => 'Dikirim',
            'cancelled' => 'Dibatalkan',
            'finished' => 'Selesai',
            default => $this->status,
        };
    }
}
