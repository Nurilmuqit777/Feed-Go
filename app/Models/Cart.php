<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->product->product_price;
    }

    public function getTotalDiscountPriceAttribute()
    {
        return $this->quantity *($this->product->product_discount_price ?? $this->product->product_price);
    }

    public function getDiscountAmountAttribute()
    {
        return $this->quantity * ($this->product->product_price - ($this->product->product_discount_price ?? $this->product->product_price));
    }
}
