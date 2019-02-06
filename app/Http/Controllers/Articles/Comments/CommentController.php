<?php

namespace App\Http\Controllers\Articles\Comments;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    /**
     * Update the news comment in the application.
     *
     * @param  Request $request The request information instance.
     * @param  Comment $comment The entity from the article comment in the database.
     * @return RedirectResponse
     */
    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $this->authorize('edit-comment', $comment);
        $request->validate(['comment' => 'required|string']);

        // If comment has been updated successfully create a flash message
        // And set it to the comment section from the controller that is attached to the comment.
        if ($comment->update($request->all())) {
            $this->flashMessage->success('Your comment has been edited.');
        }

        return redirect()->to(route('article.show', $comment->commentable) . '#comments');
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
