<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class UserPolicy
 * 
 * @package App\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user is the same as the given user. 
     *
     * @param  User  $authUser
     * @param  User  $userModel
     * @return bool
     */
    public function sameUser(User $authUser, User $userModel): bool
    {
        return $authUser->id === $userModel->id;
    }
}
