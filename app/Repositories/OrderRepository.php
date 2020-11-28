<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{

    public function find($id) : Order
    {
        return Order::find($id);
    }

    public function all()
    {
        return Order::all();
    }

    public function create($orderData) : Order
    {
        return Order::create($orderData);
    }

    public function registerTransactionData(Order $order, $transaction_id )
    {
        $objOrder =  Order::find($order->id);
        $objOrder->transaction_id = $transaction_id ;
        $objOrder->save();
    }

    public function updateStatusTransaction(Order &$order, $status)
    {
        $objOrder =  Order::find($order->id);
        $objOrder->status = $status ;
        $objOrder->save();
    }
}
