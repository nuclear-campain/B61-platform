<?php

namespace App\Http\Controllers\Monitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Models\City;

/**
 * Class SharedController 
 * ---- 
 * Controller for all the shared logic between frontend and backend off the application. 
 * 
 * @package App\http\Controllers\Monitor
 */
class SharedController extends Controller
{
    /**
     * Function for displaying the city information in the application. 
     * 
     * @param  City $city The model entity from the resource storage. 
     * @return View
     */
    public function show(City $city): View
    {
        $municipalities = City::wherePostalId($city->postal_id)->where('name', '!=', $city->name)->get();
        return view('monitor.show', compact('city', 'municipalities'));
    }
}
