<?php

namespace App\Services\Shop\Order;

use App\Models\Shop\Order;
use App\Models\Shop\OrderCart;
use App\Services\Shop\Cart\ICart;
use App\Services\Shop\Cart\ShoppingCartService;
use Illuminate\Http\Request;

/**
 * Class OrdersService
 * @package App\Services\Shop\Order
 */
class OrdersService
{
    /**
     * @var ICart
     */
    private $cartService;

    public function __construct()
    {
        $this->cartService = app(ShoppingCartService::class);
    }

    public function create(Request $request)
    {
        $data = $request->except(['token']);

        $data['user_id'] = auth()->id() ?? null;

        return \DB::transaction(function () use ($data) {
            /** @var Order $order */
            $order = Order::create([
                'fullname' => $data['fullname'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'address' => $data['address'],
                'commentary' => $data['commentary'] ?? null,
                'user_id' => $data['user_id'],
                'status' => Order::STATUS_AWAITING_PAYMENT,
                'total_price' => $this->cartService->getTotalPrice()
            ]);

            foreach ($this->cartService->getContent() as $cartItem) {
                OrderCart::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->id,
                    'price' => $cartItem->price,
                    'quantity' => $cartItem->quantity,
                ]);
            }

            return true;
        });
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return bool
     */
    public function update(Order $order, Request $request)
    {
        $data = $request->except(['_token', '_method']);

        $result = $order->update($data);

        // @todo: make cart change functional

        return $result;
    }
}
