<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class statcontroller extends Controller
{
   public function index() {
        $ordersCount = \App\Models\Order::count();
        $salesCount = \App\Models\Order::where('status', 'completed')->count();
        $customersCount = \App\Models\Customer::count();
        $productsCount = \App\Models\Product::count();

        // بيانات الرسم البياني القرصي (نسب المبيعات حسب المنتج)
       $salesByProduct = \App\Models\OrderItem::selectRaw('product_id, COUNT(*) as total')
    ->groupBy('product_id')->pluck('total', 'product_id');

// مبيعات كل شهر (من جدول orders)
$salesByMonth = \App\Models\Order::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
    ->groupBy('month')->orderBy('month')->pluck('total', 'month');

        return view('dashboard-pages.stat.stat', compact('ordersCount', 'salesCount', 'customersCount', 'productsCount', 'salesByProduct', 'salesByMonth'));
    }
}
