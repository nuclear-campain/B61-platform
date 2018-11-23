<?php

namespace App\Http\Controllers\Monitor\Status;

use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{Request, RedirectResponse};

/**
 * Class StatusController
 * ----
 * Controller that handles the chapter declarations from cities in the application. 
 * The only status can be accepted of rejected. 
 * 
 * @package App\Http\Controllers\Monitor
 */
class AcceptController extends Controller
{
    /**
     * StatusController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        parent::__construct(); // Initiate base controller for the controllers. 
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Method for register an city as accepted. 
     * 
     * @param  City $city The storage resource entity form the city. 
     * @return View 
     */
    public function index(City $city): View
    {
        return view('monitor.backend.status.accept', compact('city'));
    }

    /**
     * Store the charter status 'accept' in the sto-rage with the declaration. 
     * 
     * @param  Request $request The collection bag for the request information.
     * @param  City    $city    The resource entity form the given city. 
     * @return RedirectResponse
     */
    public function store(Request $request, City $city): RedirectResponse
    {
        $this->validate($request, ['charter' => 'required|mimes:pdf']);

        if ($city->postal->charter_status !== 'Accepted' && $city->postal->update(['charter_status' => 'Accepted'])) {
            $city->postal->addMediaFromRequest('charter')->usingFileName('charter-' . $city->postal->code)->toMediaCollection('charters-' . $city->postal->code, 'charters');
            $this->flashMessage->success("{$city->name} has accepted the charter against nuclear weapons.")->important();
        }

        return redirect()->back(); // HTTP/2 - 302
    }
}
