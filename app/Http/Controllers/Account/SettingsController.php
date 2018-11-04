<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

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

    public function updateInformation(InformationValidator $input): View 
    {

    }
}
