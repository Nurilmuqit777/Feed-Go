<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        return view('layouts.product');
    }

    public function indexCart()
    {
        return view('layouts.cart');
    }

    public function indexCheckout()
    {
        return view('layouts.checkout');
    }

    public function show(string $slug)
    {
        $product = Product::with(['category', 'reviews.user'])->where('product_slug', $slug)->firstOrFail();

        $relatedProducts = Product::with('category')
        ->where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->where('product_status', 'available')
        ->latest()
        ->take(4)
        ->get();

        return view('layouts.product-detail', compact('product','relatedProducts'));
    }

}
