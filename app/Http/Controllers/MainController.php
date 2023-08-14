<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MainController extends Controller
{
    public function home()
    {
        $products = Product::active()->latest()->paginate(20);

        return view('home')->with('products', $products);
    }

    public function thanks()
    {
        if (session()->has('order')) {
            return view('thanks');
        }

        return redirect()->route('home');
    }
}
