<?php

namespace App\Http\Controllers\Articles\Comments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use BeyondCode\Comments\Comment;

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
}
