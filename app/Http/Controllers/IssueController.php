<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Repositories\GithubRepository;
use Illuminate\Http\{RedirectResponse, Request};

/**
 * Class IssueController
 * ---
 * Controller that allowing u!sers to report issues in the application. 
 * The controller Will Handle them and create them in our public Github Issue tracker. 
 *  
 * @package App\Http\Controllers
 */
class IssueController extends Controller
{
    /**
     * Create new IssueController instance. 
     * 
     * @return void 
     */
    public function __construct() 
    {
        $this->github = new GithubRepository; 
        $this->middleware(['auth']);
    }

    /**
     * Method for displaying the submit view in the application. 
     * 
     * @return View
     */
    public function create(): View
    {
        return view('issues.create');
    }

    /**
     * Method for saving the issue report on github. 
     * 
     * @param  Request $request The request information instance
     * @return RedirectResponse
     */
    public function store(Request $input): RedirectResponse
    {
        $input->validate(['title' => 'required|string', 'body' => 'required|string']); 

        return redirect()->route('issue.report');
    }
}
