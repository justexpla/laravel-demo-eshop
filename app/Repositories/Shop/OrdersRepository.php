<?php

namespace App\Repositories\Shop;

use App\Models\Shop\Order as Model;
use App\Models\User;

class OrdersRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Model::class;
    }

    /**
     * Returns orders list by user
     *
     * @param User $user
     * @return mixed
     */
    public function getOrdersByUser(User $user)
    {
        $data = $this->startConditions()
            ->select(['id', 'created_at', 'status', 'total_price'])
            ->where(['user_id' => $user->id])
            ->orderByDesc('created_at')
            ->get();

        return $data;
    }

    /**
     * Returns cart of an order
     *
     * @param Model $order
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function loadCart(Model $order)
    {
        $data = $order->cart()
            ->with(['product'])
            ->get();

        return $data;
    }
}
