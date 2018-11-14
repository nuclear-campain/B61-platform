<?php

namespace App\Http\Controllers\Monitor;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Function for displaying the notation create view.
     *
     * @todo Build up the view.
     * @todo Implement the route
     *
     * @param  City $city The resource entity from the storage.
     * @return View
     */
    public function create(City $city): View
    {
        return view('monitor.notations.create');
    }

    /**
     * Method for storing a city notation in the application.
     *
     * @todo Implement the route
     * @todo Implement the form request class.
     * @todo Implement the controller logic.
     *
     * @param  NotationValidator $input The form request class that handles the validation.
     * @param  City              $city  The resource entity from the storage.
     * @return RedirectResponse
     */
    public function store(NotationValidator $input, City $city): RedirectResponse
    {
        $input->merge(['author_id' => $this->auth->user()->id]); // TODO: Check if we can use a observer for this action.

        dump($city->notations()->save($input->all()));

        if ($city->notations()->save($input->all())) { // Notation has been saved.
            $this->flashMessage->success("The notation for {$city->name} has been saved.");
        }

        return redirect()->route('monitor.notations', $city);
    }
}
