<?php

namespace App\Http\Controllers\Articles\Comments;

use Gate;
use Illuminate\Http\{RedirectResponse, Request};
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Models\Comment;

/**
 * Class ReportController
 * 
 * @package App\Http\Controllers\Articles\Comments
 */
class ReportController extends Controller
{
    /**
     * ReportController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        parent::__construct(); // Initiate the global constructor for the controllers. 
        $this->middleware(['auth']);
    }

    /**
     * Create view for an comment report in the application. 
     * 
     * @param  Comment $comment The resource entity form the comment that the user want to report. 
     * @return View
     */
    public function create(Comment $comment): View
    {   
        return view('comments.report', compact('comment'));
    }

    /**
     * Method for reporting an comment in the application. 
     * 
     * @param  Request $request The request information bag that contains the inputs. 
     * @param  Comment $comment The storage entity form the comment in the database.
     * @return RedirectResponse
     */
    public function store(Request $request, Comment $comment): RedirectResponse
    {
        $request->validate(['reason' => 'required|string']);
       
        $comment->report(['reason' => $request->reason, 'meta' => []], $this->auth->user());
        $this->flashMessage->success('We have recieved your report. We will look after it soon!');

        return redirect()->back();
    }
}
