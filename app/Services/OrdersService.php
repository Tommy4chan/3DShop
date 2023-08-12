<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersService {
 
    public function store(Request $request){
        $order = new Order();

        $order->name = $request->name;
        $order->number = $request->number;
        $order->comment = $request->comment;
        $order->product_id = $request->product_id;

        $order->save();

        return $order;
    }
}