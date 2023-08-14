<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UtilsService
{
    public function isProductExistOrActive(string $id, string $message)
    {
        $product = Product::find($id);

        if ($product == null || (! $product->isActive() && ! (Auth::check() && Auth::user()->isAdmin()))) {
            abort(404, $message);
        }

        return $product;
    }

    public function isOrderExist(string $id, string $message)
    {
        $order = Order::find($id);

        if ($order == null) {
            abort(404, $message);
        }

        return $order;
    }
}
