<?php

namespace App\Http\Controllers\Monitor\Status;

use App\Http\Controllers\Controller;
use App\Models\City;
use CyrildeWit\EloquentViewable\Contracts\View;

/**
 * Class RejectController
 *
 * @package App\Http\Controllers\Monitor\Status
 */
class RejectController extends Controller
{
    /**
     * RejectController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * @return View|RedirectResponse
     */
    public function index(City $city)
    {
        if ($city->postal->charter_status !== 'Rejected') {
        }

        $this->flashMessage->warning('');
        return redirect()->back();
    }
}
