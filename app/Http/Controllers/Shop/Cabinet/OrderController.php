<?php

namespace App\Http\Controllers\Shop\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shop\BaseController;
use App\Models\Shop\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $orders = Order::all();

        return view('shop.cabinet.order.index')->with([
            'orders' => $orders,
        ]);
    }

    public function show(Order $order)
    {
        $order = $order->load(['cart']);
        $cartItems = $order->cart()->get();

        return view('shop.cabinet.order.show')->with([
            'order' => $order,
            'cartItems' => $cartItems
        ]);
    }
}
