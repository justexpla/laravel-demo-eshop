<?php

namespace App\Http\Controllers\Shop\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shop\BaseController;
use App\Models\Shop\Order;
use App\Repositories\Shop\OrdersRepository;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers\Shop\Cabinet
 */
class OrderController extends BaseController
{
    /**
     * @var OrdersRepository
     */
    private $ordersRepository;

    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $orders = $this->ordersRepository->getOrdersByUser(auth()->user());

        return view('shop.cabinet.order.index')->with([
            'orders' => $orders,
        ]);
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Order $order)
    {
        $this->authorize('show', $order);

        $order = $order->load(['cart']);
        $cartItems = $this->ordersRepository->loadCart($order);

        return view('shop.cabinet.order.show')->with([
            'order' => $order,
            'cartItems' => $cartItems
        ]);
    }
}
