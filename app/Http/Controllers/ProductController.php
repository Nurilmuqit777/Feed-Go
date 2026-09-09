<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
