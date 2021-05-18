<?php

namespace App\Policies;

use App\Hostname;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class HostnamePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hostname  $hostname
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->getRole()->id !== 3
            ? Response::allow()
            : Response::deny('Cannot view hostnames');//view('home')->withErrors(['error' => 'You cannot view hostnames']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->getRole()->id === 4 || $user->getRole()->id < 3
            ? Response::allow()
            : back()->withErrors(['error' => 'You cannot create hostnames']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hostname  $hostname
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->id !== 3
            ? Response::allow()
            : back()->withErrors(['error' => 'You cannot update hostnames']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hostname  $hostname
     * @return mixed
     */
    public function delete(User $user, Hostname $hostname)
    {
        return $user->id === $hostname->user_id || $user->getRole()->id < 3
            ? Response::allow()
            : Response::deny('You cannot delete hostnames');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hostname  $hostname
     * @return mixed
     */
    public function restore(User $user, Hostname $hostname)
    {
        return $user->id === $hostname->user_id || $user->getRole()->id < 3
            ? Response::allow()
            : Response::deny('You cannot restore hostnames');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Hostname  $hostname
     * @return mixed
     */
    public function forceDelete(User $user, Hostname $hostname)
    {
        return $user->id === $hostname->user_id || $user->getRole()->id < 3
            ? Response::allow()
            : Response::deny('You cannot force delete hostnames');
    }
}
