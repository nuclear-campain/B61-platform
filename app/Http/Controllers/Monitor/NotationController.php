<?php

namespace App\Http\Controllers\Monitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Contracts\View\View;

/**
 * Class NotationController
 * 
 * @package App\Http\Controllers\Monitor
 */
class NotationController extends Controller
{
    /**
     * Notation constructor. 
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct(); // Initiate the global constructor. 
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Function for displaying all the notations from a city in the application backend. 
     *
     * @return View
     */
    public function index(City $city): View 
    {
        $notations = $city->notations()->simplePaginate();
        return view('monitor.notations.index', compact('city', 'notations'));
    }
}
