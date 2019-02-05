<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleRepository
 *
 * @package App\Repositories
 */
class ArticleRepository extends Model
{
    /**
     * Method for processing an article delete request in the application.
     *
     * @throws \Exception When no article has been found in the storage.
     * @return void
     */
    public function processDeleteRequest(): void
    {
        // The model is deleted in the application.
        // So inform the user with a flash admin. And provide the undo link.
        if ($this->delete()) {
            $undoLink = '<a href="'. route('article.delete.undo', $this) .'" class="no-underline">undo</a>';
            (new FlashRepository)->success("The article <strong>{$this->title}</strong> has been deleted." . $undoLink)->important();
        }
    }
}