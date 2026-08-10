<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = ['user_id', 'status','expired_at', 'total_price', 'invoice_number'];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails():HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function orderAddress():HasOne
    {
        return $this->hasOne(OrderAddress::class);
    }

    public function payments():HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function getFormattedTotalPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    public function getTotalDiscountAttribute(): float
    {
        return $this->orderDetails->sum->discount_amount;
    }

    public function getOriginalTotalAttribute(): float
    {
        return $this->orderDetails->sum->original_subtotal;
    }

    public function getTotalProductAttribute(): float
    {
        return $this->orderDetails->sum(fn($detail) => ($detail->discount_price_at_purchase ?? $detail->price_at_purchase) * $detail->quantity_ordered);
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'yellow',
            'processing' => 'blue',
            'shipped' => 'orange',
            'completed' => 'green',
            'cancelled' => 'red',
            default => 'gray',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'Tertunda',
            'processing' => 'Diproses',
            'shipped' => 'Dikirim',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
            default => $this->status,
        };
    }
}
