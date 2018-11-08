<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Article;

/**
 * Class HomeController 
 * 
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index']);
    }

    /**
     * Get the application his welcome page. 
     * 
     * @return View 
     */
    public function welcome(Article $article): View 
    {
        return view('welcome', ['articles' => $article->take(3)->latest()->get()]);
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function dashboard(): View
    {
        return view('home');
    }
}
