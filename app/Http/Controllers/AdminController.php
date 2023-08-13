<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        $productsCount = Product::count();
        $activeProductsCount = Product::active()->count();

        $ordersCount = Order::count();
        $newOrdersCount = Order::new()->count();
        $inProgressOrdersCount = Order::inProgress()->count();

        $products = (object) [
            'all' => $productsCount, 
            'active' => $activeProductsCount, 
            'notActive' => $productsCount - $activeProductsCount
        ];

        $orders = (object) [
            'all' => $ordersCount, 
            'new' => $newOrdersCount, 
            'inProgress' => $inProgressOrdersCount
        ];

        return view('admin.index')->with('products', $products)->with('orders', $orders);
    }


}
