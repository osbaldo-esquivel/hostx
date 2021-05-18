<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AdminPolicy
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

    public function view(User $user)
    {
        return $user->role_id < 3
            ? Response::allow()
            : Response::deny('You cannot view admin page');
    }

    public function create(User $user)
    {
        return $user->is_admin || $user->getRole()->id < 3
            ? Response::allow()
            : Response::deny('Unauthorized');
    }
}
