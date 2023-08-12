<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $products = Product::active()->latest()->get();

        return view('home')->with('products', $products);
    }

    public function thanks(){
        if(session()->has('order')){
            return view('thanks');
        }

        return redirect()->route('home');
    }
}