<?php

namespace App\Policies;

use App\Models\Shop\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }
}
