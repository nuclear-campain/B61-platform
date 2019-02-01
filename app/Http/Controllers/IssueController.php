<?php

namespace App\Http\Controllers;

use App\Mail\BugReported;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\{RedirectResponse, Request};
use App\Repositories\FlashRepository;

/**
 * Class IssueController 
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
        
        Mail::to(config('platform.webmaster.email'))->queue(new BugReported($input->all()));
        (new FlashRepository)->success('Thank you for submitting a bug. Administrators will look after it ASAP.');

        return redirect()->route('issue.report');
    }
}
