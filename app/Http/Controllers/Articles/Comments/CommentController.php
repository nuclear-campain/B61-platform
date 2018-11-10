<?php

namespace App\Http\Controllers\Articles\Comments;

use App\Models\Article;
use Illuminate\Http\{Request, RedirectResponse};
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function comment(Request $request, Article $article): RedirectResponse
    {
        $request->validate(['comment' => 'required|string']);
        $article->comment($request->comment);

        return redirect()->to(url()->previous() . '#comments');
    }
}
