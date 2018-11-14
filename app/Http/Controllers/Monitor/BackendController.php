<?php

namespace App\Http\Controllers\Monitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\City;

/**
 * BackendController 
 * 
 * @package App\Http\Controllers\Monitor
 */
class BackendController extends Controller
{
    /**
     * BackendController constructor
     * 
     * @return void
     */
    public function __construct() 
    {
        parent::__construct(); // Initiate the parent constructor in this controller. 
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Function for displaying the backend dashboard from the monitor. 
     * 
     * @todo Implement message for an empty table. ( @forelse statement in blade. )
     * @todo Implement the search method for the overview page. (search baased on name and postal.)
     * 
     * @param  City $cities Storage entity model from all the cities in the storage. 
     * @return View
     */
    public function index(Request $request, City $cities): View 
    {
        if (in_array($request->filter, ['Accepted', 'Pending', 'Rejected'])) {
            $cities = $cities->getByStatus($request->filter);
        }

        // If no valid filter is given go further with the collection of all the 
        // Cities in the application database storage. 

        return view('monitor.backend.dashboard', ['cities' => $cities->simplePaginate()]);
    }

    /**
     * Function for displaying the city information in the backend. 
     * 
     * @param  City $city The resource entity from the given city.
     * @return View
     */
    public function show(City $city): View 
    {
        return view('monitor.backend.show', compact('city'));
    }
}
