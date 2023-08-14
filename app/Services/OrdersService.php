<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersService {

    public function index()
    {
        $filter = request()->query('filter');

        $orders = Order::latest('id');

        if($filter != null){
            $orders = $orders->where('status', $filter);
        }

        $orders = $orders->paginate(25)->withQueryString();

        return $orders;
    }

    public function store(Request $request){
        $order = new Order();

        $order->name = $request->name;
        $order->number = $request->number;
        $order->comment = $request->comment;
        $order->product_id = $request->product_id;

        $order->save();

        return $order;
    }

    public function update(Request $request, Order $order)
    {
        $order->status = $request->status;

        $order->update();
    }
}