<?php

namespace App\Http\Controllers\Monitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Monitor\CityInformationValidator;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        $provinces = Province::all();
        return view('monitor.backend.show', compact('city', 'provinces'));
    }

    /**
     * Method for updating the city information in the application.
     * ----
     * The postal code can't be updated because it is used to connect data to it trough
     * the platform.
     *
     * @param  CityInformationValidation $input The form request class that handles the validation.
     * @param  City                      $city  The city entity from the storage.
     * @return RedirectResponse
     */
    public function update(CityInformationValidator $input, City $city): RedirectResponse
    {
        $input->merge(['province_id' => $input->province]);

        if ($city->update($input->all())) {
            $this->flashMessage->success("The city <strong>{$city->name}</strong> has been updated");
        }

        return redirect()->route('monitor.admin.show', $city);
    }
}
