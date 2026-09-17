<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomepageController extends Controller
{

    public function index()
    {
        $products =Product::inRandomOrder()->take(2)->get();
        return view('layouts.homepage', compact('products'));
    }

    public function privacyPolicy()
    {
        return view('layouts.privacy-policy');
    }

    public function termsConditions()
    {
        return view('layouts.terms-conditions');
    }

    public function contact()
    {
        return view('layouts.contactus');
    }

}
