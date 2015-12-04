<?php

namespace KnowTube\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use KnowTube\User;
use KnowTube\Resource;

class ResourcePolicy
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

    public function change(User $user, Resource $resource)
    {
        return $resource->user_id == $user->id;
    }
}
