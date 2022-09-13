<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\OrdersResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        if(auth()->user()->tokenCan('order:index')){
            return response()->json(['data' => OrdersResource::collection(Order::all())]);
        }

        return response()->json([

            'data' => [
                'message' => 'You do not have permission'
            ]
        ]);


    }

    public function show(Order $order)
    {
        if(auth()->user()->tokenCan('order:index')){
            return response()->json(['data' => new OrdersResource($order)]);
        }

        return response()->json([

            'data' => [
                'message' => 'You do not have permission'
            ]
        ]);

    }
}
