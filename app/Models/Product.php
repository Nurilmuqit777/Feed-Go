<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'product_name',  'product_description', 'product_weight', 'product_unit', 'product_price', 'product_discount_price', 'product_stock','product_status', 'product_image1', 'product_image2', 'product_image3', 'product_image4', 'product_slug'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function isNew()
    {
        return $this->created_at && $this->created_at->diffInDays(now()) < 7;
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->product_discount_price && $this->product_price > 0) {
            $discount = (($this->product_price - $this->product_discount_price) / $this->product_price) * 100;
            return round($discount);
        }
        return 0;
    }

    public function getHasDiscountAttribute()
    {
        return $this->product_discount_price && $this->product_discount_price < $this->product_price;
    }

    public function getFinalPriceAttribute()
    {
        return $this->has_discount ? $this->product_discount_price : $this->product_price;
    }
}
