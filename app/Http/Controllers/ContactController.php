<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactValidator;
use App\Mail\SendContactMail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

/**
 * Class ContactController
 * ---
 * View is only defined in the frontend routes file. Mainly because it is a static view file.
 * That doesn't require any data from the storage.
 *
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    /**
     * Function for sending the contact form to the configured email.
     *
     * Controller is an invoke instance because we only only need one function
     * in the controller and it is cleaner to use in the routes file.
     *
     * @todo Imlement platform config variable.
     *
     * @param  ContactValidator The form request instance that handles all the validation.
     * @return RedirectResponse
     */
    public function __invoke(ContactValidator $input): RedirectResponse
    {
        Mail::to(config('platform.contact.email'))->queue(new SendContactMail($input->all()));

        $flashMessage = 'Thanks for sending us your message or question. We will answer as soon as possibble.';
        $flashTitle   = '<i class="fe fe-check mr-1"></i> Thank you for contacting us.';

        $this->flashMessage($flashMessage, $flashTitle);
        return redirect()>route('contact');
    }
}
