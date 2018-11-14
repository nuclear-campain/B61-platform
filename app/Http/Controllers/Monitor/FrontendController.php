<?php

namespace App\Http\Controllers\Monitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
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
        $notations      = $city->notations();

        return view('monitor.show', compact('city', 'municipalities', 'notations'));
    }
}
