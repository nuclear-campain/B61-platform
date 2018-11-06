<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

/**
 * Class ContactController
 * 
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    /**
     * Contact page for the application. 
     * 
     * @return View
     */
    public function index(): View
    {
        return view('contact.index');
    }
}
