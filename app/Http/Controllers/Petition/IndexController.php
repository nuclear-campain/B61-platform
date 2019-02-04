<?php

namespace App\Http\Controllers\Petition;

use App\Models\Fragment;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class IndexController
 * 
 * @package App\Http\Controllers\Petition
 */
class IndexController extends Controller
{
    /**
     * Method for displaying the petition in the application.
     *
     * @return View
     */
    public function index(): View
    {
        $petition = Fragment::whereSlug('petition')->first();
        return view('petition.index', compact('petition'));
    }

    /**
     * Method for displaying the edit view from the petition text.
     *
     * @return View
     */
    public function edit(): View
    {
        $petition = Fragment::whereSlug('petition')->first();
        return view('petition.edit', compact('petition'));
    }
}
