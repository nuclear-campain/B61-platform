<?php

namespace App\Http\Controllers\Monitor;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class FrontendController
 * 
 * @package App\Http\Controllers\Monitor
 */
class FrontendController extends Controller
{
    /**
     * Get the frontend index View for the city monitor. 
     * 
     * @param  City $cities The resource model for the cities in the database storage.
     * @return View
     */
    public function index(City $cities): View 
    {
        return view('monitor.index', [
            'cities' => $cities->simplePaginate(),
            'notations' => $cities->notations()->simplePaginate(),
        ]);
    }

     /**
     * Function for displaying the city information in the application. 
     * 
     * @param  City $city The model entity from the resource storage. 
     * @return View
     */
    public function show(City $city): View
    {
        $municipalities = City::wherePostalId($city->postal_id)->where('name', '!=', $city->name)->get();
        $notations      = $city->getNotations()->simplePaginate();

        return view('monitor.show', compact('city', 'municipalities', 'notations'));
    }
}
