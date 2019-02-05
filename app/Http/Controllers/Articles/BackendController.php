<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleValidator;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * @param  Request $request  The request information collection instance.
     * @param  Article $articles The resource model for the article storage.
     * @return View
     */
    public function index(Request $request, Article $articles): View
    {
        switch ($request->get('filter')) { // Filter down the articles in the database.
            case 'published': $articles = $articles->getDraftsOnly(false);  break;
            case 'draft':     $articles = $articles->getDraftsOnly(true);   break;
            case 'deleted':   $articles = $articles->deletedArticles();     break;
        }

        return view('articles.dashboard', ['articles' => $articles->orderBy('created_at', 'DESC')->simplePaginate()]);
    }

    /**
     * Method for getting the result from the search in the application
     *
     * @param  Request $request  The request information collection instance.
     * @param  Article $articles The resource model for the article storage.
     * @return View
     */
    public function search(Request $request, Article $articles): View
    {
        $term     = $request->search; // Map the given user input to the term variable.
        $articles = $articles->where('title', 'LIKE', "%{$term}%")->orWhere('content', 'LIKE', "%{$term}%")
            ->orderBy('created_at', 'DESC')->simplePaginate();

        return view('articles.dashboard', compact('articles'));
    }

    /**
     * Update the article statçus in the database storage.
     *
     * @param  Article $article The database entity from the news article
     * @param  string  $status  The newly status for the news article
     * @return RedirectResponse
     */
    public function status(Article $article, string $status): RedirectResponse
    {
        switch ($status) {
            case 'draft':   $article->update(['is_draft' => true]);  break;
            case 'publish': $article->update(['is_draft' => false]); break;
        }

        return redirect()->route('articles.dashboard');
    }

    /**
     * The create view for an article.
     *
     * @return View
     */
    public function create(): View
    {
        $statusTypes = [ 1 => 'I want to keep this articles as draft.', 0 => 'I want to publish the article.'];
        return view('articles.create', compact('statusTypes'));
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
            $article->author()->associate($this->auth->user())->save(); // TODO: Register in model observer function.
            $this->flashMessage->success('The news article has been stored!');
        }

        return redirect()->route('articles.dashboard');
    }

    /**
     * Delete a news article in the storage.
     *
     * @todo Implement route (View and routes file)
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
