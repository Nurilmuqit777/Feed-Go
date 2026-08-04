<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = [
        'order_id',
        'recipient_name',
        'recipient_phone',
        'email',
        'note',
        'phone_number',
        'province',
        'regency',
        'district',
        'village',
        'full_address',
        'postal_code',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
