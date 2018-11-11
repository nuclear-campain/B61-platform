<?php

namespace App\Http\Controllers\Articles\Comments;

use App\Models\Article;
use Illuminate\Http\{Request, RedirectResponse};
use App\Http\Controllers\Controller;
use BeyondCode\Comments\Comment;
use Illuminate\Contracts\View\View;

/**
 * Class CommentController 
 * ----
 * Report logic for comments is separated in a different controller. 
 * 
 * @see     App\Http\Controllers\Articles\ReportController::class
 * @package App\Http\Controllers\Articles\Comments
 */
class CommentController extends Controller
{
    /**
     * CommentController Constructor 
     * 
     * @return void 
     */
    public function __construct() 
    {
        parent::__construct();
        $this->middleware(['auth']);
    }

    /**
     * Store a comment on an article in the storage. 
     * 
     * @param  Request $request The request instance that holds all the request information. 
     * @param  Article $article The article entity from the database storage. 
     * @return RedirectResponse 
     */
    public function comment(Request $request, Article $article): RedirectResponse
    {
        $request->validate(['comment' => 'required|string']);
        $article->comment($request->comment);

        return redirect()->to(url()->previous() . '#comments');
    }

    /**
     * Function for displaying the dit form in the application.
     * 
     * @see \App\Policies\CommentPolicy@editComment()
     * 
     * @param  Comment $comment The comment entity from the storage. 
     * @return RedirectResponse
     */
    public function edit(Comment $comment): View
    {
        $this->authorize('edit-comment', $comment);     
        return view('comments.edit', compact('comment'));
    }

    public function update(): RedirectResponse
    {
        // TODO: Build up the function
    }

    /**
     * Delete a comment in the application. 
     * 
     * @see \App\Policies\CommentPolicy@deleteComment()
     * 
     * @param  Comment $comment The comment entity from the storage. 
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $this->authorize('delete-comment', $comment);
        $comment->delete();

        return redirect()->to(url()->previous() . '#comments'); // Redirect back to previous url
    }
}
