<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleValidator;
use Illuminate\Contracts\View\View;

/**
 * Class BackendController
 *
 * @package App\Http\Controllers\Articles
 */
class BackendController extends Controller
{
    /**
     * BackendController constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Get the management dashboard for the news articles in the application.
     *
     * @param  Request $request  The information request information bag.
     * @param  Article $articles The resource model for the article storage.
     * @return View
     */
    public function index(Request $request, Article $articles): View
    {
        //! ->getIsDraftOnly(<indicator>); errors because it is not implemented in form and ERD

        switch ($request->get('filter')) { // Filter down the articles in the database.
            case 'published': $articles = $articles->getDraftsOnly(false);  break;
            case 'draft':     $articles = $articles->getDraftsOnly(true);   break;
            case 'deleted':   $articles = $articles->deletedArticles();     break;
        }

        return view('articles.dashboard', ['articles' => $articles->orderBy('created_at', 'DESC')->simplePaginate()]);
    }

    /**
     * The create view for an article.
     *
     * @return View
     */
    public function create(): View
    {
        return view('articles.create');
    }

    /**
     * Method for storing a article in the storage.
     *
     * @param  ArticleValidator $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function store(ArticleValidator $input, Article $article): RedirectResponse
    {
        if ($article = $article->create($input->all())) {
            $article->author()->associate($this->auth->user())->save();
            $this->flashMessage->success('The news article has been stored!');
        }

        return redirect()->route('articles.dashboard');
    }

    /**
     * Delete a news article in the storage.
     *
     * @todo Implement route
     * @todo Implement undo system
     *
     * @param  Article $article The resource entity from the article in the storage.
     * @return RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        if ($article->destroy()) {
            $this->flashMessage->success("The article <strong>{$article->title}</strong> has been deleted.")->important();
        }

        return redirect()->route('articles.dashboard');
    }
}
