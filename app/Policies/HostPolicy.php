<?php

namespace App\Policies;

use App\User;
use App\Host;
use Illuminate\Auth\Access\HandlesAuthorization;

class HostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the host.
     *
     * @param  \App\User  $user
     * @param  \App\Host  $host
     * @return mixed
     */
    public function view(User $user, Host $host)
    {
        //
    }

    /**
     * Determine whether the user can create hosts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the host.
     *
     * @param  \App\User  $user
     * @param  \App\Host  $host
     * @return mixed
     */
    public function update(User $user, Host $host)
    {
        //
    }

    /**
     * Determine whether the user can delete the host.
     *
     * @param  \App\User  $user
     * @param  \App\Host  $host
     * @return mixed
     */
    public function delete(User $user, Host $host)
    {
        //
    }
}
