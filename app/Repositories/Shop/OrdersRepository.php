<?php

namespace App\Repositories\Shop;

use App\Models\Shop\Order as Model;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class OrdersRepository
 * @package App\Repositories\Shop
 */
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
     * Loads cart of an order
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

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getOrdersForAdminPage(int $perPage = 30): LengthAwarePaginator
    {
        $data = $this->startConditions()
            ->select(['id', 'fullname', 'phone', 'status', 'email', 'total_price', 'created_at'])
            ->latest()
            ->with(['cart'])
            ->paginate($perPage);

        return $data;
    }
}
