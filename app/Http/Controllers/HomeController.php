<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Article;
use App\User;

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
     * @param  Article $article The model entity for getting the first 3 articles in the storage. 
     * @return View 
     */
    public function welcome(Article $article): View 
    {
        return view('welcome', ['articles' => $article->whereIsDraft(false)->take(3)->latest()->get()]);
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function dashboard(): View
    {
        $users = User::orderBy('created_at', 'desc')->take(6)->get();

        return view('home', compact('users'));
    }
}
