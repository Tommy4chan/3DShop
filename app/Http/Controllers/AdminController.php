<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function home()
    {
        $products = new Product();
        $orders = new Order();

        return view('admin.index')->with('products', $products)->with('orders', $orders);
    }

    public function userIndex()
    {
        $users = User::paginate(20);

        return view('admin.user.index')->with('users', $users);
    }

    public function makeAdmin(User $user)
    {
        if ($user->isAdmin()) {
            $user->is_admin = 0;
        } else {
            $user->is_admin = 1;
        }

        $user->update();

        return redirect()->route('admin.user.index');
    }
}
