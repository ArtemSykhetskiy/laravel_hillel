<?php

namespace App\Observers;

use App\Models\Order;
use App\Notifications\OrderChangedNotification;
use App\Notifications\OrderCreatedNotification;

class OrdersObserver
{
    public function updated(Order $order)
    {
        if($order->status_id !== $order->getOriginal('status_id')){
            $order->notify(
                (new OrderChangedNotification($order))->onQueue('telegram')
            );

        }
    }
}
