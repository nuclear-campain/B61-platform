<?php

namespace App\Policies;

use App\Models\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class ArticlePolicy
 *
 * @package App\Policies
 */
class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the quest/user can see draft articles or not.
     *
     * @param  null|User $user      The entity from the authenticaed user
     * @param  Article   $article   The entity from the news article
     * @return bool
     */
    public function canViewDrafts(?User $user, Article $article): bool
    {
        return ! $article->is_draft || (auth()->check() && $user->hasRole('admin'));
    }
}
