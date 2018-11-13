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
        $this->middleware(['auth', 'role:admin'])->only(['dashboard']);
    }

    /**
     * Function for displaying the frontend dashboard from the monitor. 
     * 
     * @todo Build up the application view.
     * 
     * @param  City $cities Storage entity model from all the cities in the storage. 
     * @return View
     */
    public function index(City $cities): View
    {
        return view('monitor.frontend.dashboard', ['cities' => $cities->with(['postal'])->simplePaginate()]);
    }

    /**
     * Function for displaying the frontend dashboard from the monitor. 
     * 
     * @todo Implement message for an empty table. ( @forelse statement in blade. )
     * @todo Implement the search method for the overview page. (search baased on name and postal.)
     * 
     * @param  City $cities Storage entity model from all the cities in the storage. 
     * @return View
     */
    public function dashboard(Request $request, City $cities): View 
    {
        if (in_array($request->filter, ['Accepted', 'Pending', 'Rejected'])) {
            $cities = $cities->getByStatus($request->filter);
        }

        // If no valid filter is given go further with the collection of all the 
        // Cities in the application database storage. 

        return view('monitor.backend.dashboard', ['cities' => $cities->simplePaginate()]);
    }
}
