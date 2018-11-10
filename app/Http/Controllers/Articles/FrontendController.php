<?php

namespace App\Http\Controllers\Articles;

use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

/**
 * Class FrontendController
 *
 * @package App\Http\Controllers\Articles
 */
class FrontendController extends Controller
{
    /**
     * Method for displaying news articles in the application.
     *
     * @see \App\Policies\ArticlePolicy@canViewDrafts() => View policy
     *
     * @param  Article $article The storage entity from the article.
     * @return View
     */
    public function show(Article $article): View
    {
        if (Gate::allows('can-view-drafts', $article)) {
            $article->addView(); // Increment the view counter with one.
            $comments = $article->comments()->orderBy('created_at', 'DESC')->simplePaginate(5);
            $commentsCount = $article->comments()->count();

            return view('articles.show', compact('article', 'comments', 'commentsCount'));
        }

        // Throw an HTTP 404 response when the user is not authorized to view draft articles.
        abort(Response::HTTP_NOT_FOUND);
    }
}
