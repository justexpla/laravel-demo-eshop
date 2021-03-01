<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Shop\Order;
use App\Repositories\Shop\OrdersRepository;
use App\Services\Shop\Order\OrdersService;
use Illuminate\Http\Request;

/**
 * Class OrdersController
 * @package App\Http\Controllers\Admin\Order
 */
class OrdersController extends BaseController
{
    /**
     * @var OrdersRepository
     */
    private $ordersRepository;

    /**
     * @var OrdersService
     */
    private $ordersService;

    public function __construct()
    {
        $this->ordersRepository = app(OrdersRepository::class);
        $this->ordersService = app(OrdersService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $orders = $this->ordersRepository
            ->getOrdersForAdminPage();

        return view('admin.orders.index')->with([
            'orders' => $orders
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Order $order)
    {
        $order->cart->load(['product']);

        return view('admin.orders.show')->with([
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Order $order)
    {
        $orderStatuses = Order::getStatusList();

        return view('admin.orders.edit')->with([
            'order' => $order,
            'orderStatuses' => $orderStatuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Order $order)
    {
        $result = $this->ordersService
            ->update($order, $request);

        if ($result) {
            return redirect()->route('admin.orders.show', $order)->with([
                'status' => 'Order has been changed'
            ]);
        }
    }
}
