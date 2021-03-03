<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    /**
     * @param User $authUser
     * @param User $updatingUser
     */
    public function update(User $authUser, User $updatingUser)
    {
        return $authUser->id === $updatingUser->id;
    }
}
