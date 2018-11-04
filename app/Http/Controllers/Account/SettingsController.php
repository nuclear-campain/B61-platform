<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\{InformationValidator, SecurityValidator};
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

/**
 * Class SettingsController
 * 
 * @package App\Http\Controllers\Account
 */
class SettingsController extends Controller
{
    /**
     * SettingsController constructor 
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware(['auth']);
    }

    /**
     * Function for displaying the account settings pages. 
     * 
     * @param  null|string $type The type of settings page the user wants to display. 
     * @return View
     */
    public function index(?string $type = null): View
    {
        switch ($type) {
            case 'security':    return view('account.settings-security');
            default:            return view('account.settings-information');
        }
    }

    /**
     * Update the account information settings.
     *
     * @todo Implement route
     * @todo Build up the validator
     *
     * @param  InformationValidator $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function updateInformation(InformationValidator $input): RedirectResponse
    {
        if (Auth::user()->update($input->all())) {

        }

        return redirect()->route('account.settings');
    }

    /**
     * Update the account security settings.
     *
     * @todo Implement route
     * @todo Build up the validator
     *
     * @param  SecurityValidator $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function updateSecurity(SecurityValidator $input): RedirectResponse
    {

    }
}
