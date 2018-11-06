<?php

namespace App\Http\Controllers;

use App\Requests\ContactValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

/**
 * Class ContactController
 * 
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    public function __invoke(ContactValidator $input): RedirectResponse
    {

    }
}
