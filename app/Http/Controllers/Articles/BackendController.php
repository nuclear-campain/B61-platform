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
     * @param  Article $articles The resource model for the article storage.
     * @return View
     */
    public function index(Article $articles): View
    {
        $articles = $articles->query(); // Initiate a new query instance.
        return view('articles.dashboard', compact('articles'));
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
}
