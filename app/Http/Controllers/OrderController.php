<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Hiển thị danh sách đơn hàng của user hiện tại
     */
    public function index()
    {
        $orders = Auth::user()
                      ->orders()
                      ->with('items.product.size')
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Hiển thị chi tiết một đơn hàng, chỉ cho phép của chính user đó
     */
    public function show($id)
    {
        $order = Auth::user()
                     ->orders()
                     ->with('items.product.size')
                     ->findOrFail($id);

        return view('orders.show', compact('order'));
    }
}
