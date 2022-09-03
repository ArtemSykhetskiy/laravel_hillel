<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {

        $orders = auth()->user()->orders;
//            ->sortable(['created_at' => 'asc'])
//            ->paginate(10);


        return view('account/orders/index', compact('orders'));
    }

    public function edit(Order $order)
    {
        $statuses = OrderStatus::all();
        $products = $order->products()->get();
        return view('account/orders/edit', compact('order', 'products', 'statuses'));
    }


    public function show(Order $order)
    {
        $statuses = OrderStatus::all();
        $products = $order->products()->get();
        return view('account/orders/show', compact('order', 'products', 'statuses'));
    }
    public function cancel(Order $order)
    {
        $order->update(['status_id' => 4]);

        return redirect('/account/orders/list')->with(['session' => 'Order was canceled!']);
    }
}
