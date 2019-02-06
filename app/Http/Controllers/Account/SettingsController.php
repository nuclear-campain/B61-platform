<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\InformationValidator;
use App\Http\Requests\Account\SecurityValidator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @param  InformationValidator $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function updateInformation(InformationValidator $input): RedirectResponse
    {
        $user = $this->auth->user();

        if ($user->update($input->all())) {
            $user->clearMediaCollection("user-{$user->id}");
            $user->addMediaFromRequest('avatar')->toMediaCollection("user-{$user->id}");
            
            $this->flashMessage->success('Your account information has been updated!')->important();
        }

        return redirect()->route('account.settings');
    }

    /**
     * Update the account security settings.
     *
     * @todo Extra security layer -> User needs to give his current password for updating the user password.
     *
     * @param  SecurityValidator $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function updateSecurity(SecurityValidator $input): RedirectResponse
    {
        $user = $this->auth->user();

        if ($user->update($input->all())) {
            $this->auth->logoutOtherDevices($user->password);
            $this->flashMessage->success('Your account security has been updated!')->important();
        }

        return redirect()->route('account.settings', ['type' => 'security']);
    }
}
