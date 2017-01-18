<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Flyer;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlyerPolicy
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

    public function addPhoto(User $user, Flyer $flyer)
    {
        return $flyer->ownerBy($user);
    }
}
