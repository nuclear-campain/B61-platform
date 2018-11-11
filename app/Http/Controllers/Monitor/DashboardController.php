<?php

namespace App\Http\Controllers\Monitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\City;

/**
 * DashboardController 
 * 
 * @package App\Http\Controllers\Monitor
 */
class DashboardController extends Controller
{
    /**
     * DashboardController constructor
     * 
     * @return void
     */
    public function _construct() 
    {
        parent::__construct(); // Initiate the parent constructor in this controller. 

        $this->middleware(['auth']);
        $this->middleware(['auth', 'role:admin'])->only(['backend']);
    }

    /**
     * Function for displaying the frontend dashboard from the monitor. 
     * 
     * @param  City $cities Storage entity model from all the cities in the storage. 
     * @return View
     */
    public function index(City $cities): View
    {
        return view('monitor.frontend.dashboard', ['cities' => $cities->simplePaginate()]);
    }
}
