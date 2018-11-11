<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use BeyondCode\Comments\Comment;

/**
 * Class CommentPolicy 
 * 
 * @package App\Policies
 */
class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the authenticated user can edit comments or not. 
     * 
     * @param  null|User $user    The storage entity from the authenticated user. 
     * @param  Comment   $comment The storage entity from the comment. 
     * @return bool 
     */
    public function editComment(?User $user, Comment $comment): bool 
    {
        return $user->id === $comment->user_id;
    }

    /**
     * Determine if the authenticated user can delete the comment or not. 
     * 
     * @param  null|User $user    The storage entity from the current authenticated user. 
     * @param  Comment   $comment The storage entity from the comment 
     * @return bool 
     */
    public function deleteComment(?User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id || $user->hasRole('admin');
    }
}
