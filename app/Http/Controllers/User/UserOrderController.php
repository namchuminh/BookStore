<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DetailOrder;

class UserOrderController extends Controller
{
    public function show($id){
        $products = DetailOrder::with('order')->with('book')->where('order_id', $id)->get();
        $order = Order::where('id', $id)->firstOrFail();
        return view('user.order.show', compact('products', 'order'));
    }
}
