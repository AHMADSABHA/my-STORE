<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('customer.orders', compact('orders'));
    }
    public function list()
    {
        $users = User::with('orders')->get();
        $orders = Order::paginate(5);
        $orderitems = Order::with('orderItems')->get();
        return view('dashboard-pages.orders.orders', compact('orders', 'users', 'orderitems'));
    }
}
