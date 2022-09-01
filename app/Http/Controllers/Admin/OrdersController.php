<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderStatus;
use function redirect;
use function view;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with(['users', 'status'])->paginate(10);

        return view('admin/orders/index', compact('orders'));
    }

    public function edit(Order $order)
    {
        $statuses = OrderStatus::all();
        $products = $order->products()->get();

        return view('admin/orders/edit', compact('statuses', 'products'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return redirect()->back()->with(['session' => 'Order was updated']);
    }
}
