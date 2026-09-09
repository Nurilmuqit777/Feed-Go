<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity_ordered', 'price_at_purchase', 'discount_price_at_purchase', 'sub_total'];

    protected $casts = [
        'quantity_ordered' => 'integer',
        'price_at_purchase' => 'decimal:2',
        'discount_price_at_purchase' => 'decimal:2',
        'sub_total' => 'decimal:2',
    ];

    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function review():HasOne
    {
        return $this->hasOne(Review::class);
    }

    public function getSubtotalAttribute(): float
    {
        return $this->quantity_ordered * $this->discount_price_at_purchase ?? $this->price_at_purchase;
    }

    public function getPriceFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->price_at_purchase, 0, ',', '.');
    }

    public function getDiscountPriceFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->discount_price_at_purchase, 0, ',', '.');
    }

    public function getOriginalSubtotalAttribute(): float
    {
        return $this->price_at_purchase * $this->quantity_ordered;
    }

    public function getDiscountSubTotalAttribute(): float
    {
       return $this->discount_price_at_purchase ?? $this->price_at_purchase * $this->quantity_ordered;
    }

    public function getDiscountAmountAttribute(): float
    {
        return ($this->price_at_purchase - ($this->discount_price_at_purchase ?? $this->price_at_purchase)) * $this->quantity_ordered;
    }
}
