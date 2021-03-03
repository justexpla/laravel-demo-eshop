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

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
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
            
            $cart = $this->cartService->getContent();
            foreach ($cart as $cartItem) {
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
     * @param array $data
     * @return bool
     */
    public function update(Order $order, array $data)
    {
        $result = $order->update($data);

        // @todo: make cart change functional

        return $result;
    }
}
