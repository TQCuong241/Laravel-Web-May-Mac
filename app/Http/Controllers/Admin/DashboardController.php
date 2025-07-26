<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount        = User::count();
        $productCount     = Product::count();
        $ordersThisMonth  = Order::where('payment_status', 'Đã thanh toán')
                                 ->whereYear('created_at', Carbon::now()->year)
                                 ->whereMonth('created_at', Carbon::now()->month)
                                 ->count();
        $revenueThisMonth = Order::where('payment_status', 'Đã thanh toán')
                                 ->whereYear('created_at', Carbon::now()->year)
                                 ->whereMonth('created_at', Carbon::now()->month)
                                 ->sum('total');

        return view('admin.admin', compact(
            'userCount',
            'productCount',
            'ordersThisMonth',
            'revenueThisMonth'
        ));
    }
}
