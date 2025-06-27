<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(10); // Or match by user_id if you're storing that

        return view('orders.user-orders', compact('orders'));
    }


    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(10); // Or match by user_id if you're storing that

        return view('orders.user-orders', compact('orders'));
    }

}
