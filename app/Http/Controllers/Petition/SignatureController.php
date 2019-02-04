<?php

namespace App\Http\Controllers\Petition;

use App\Http\Requests\Petition\SignatureValidator;
use App\Models\Fragment;
use App\Models\Signature;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

/**
 * Class SignatureController 
 * 
 * @package App\Http\Controllers\Petition
 */
class SignatureController extends Controller
{
    /**
     * SignatureController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(); // Initialize the main constructor for the controllers.
    }

    /**
     * Method for saving a signature in the application.
     *
     * @see \App\Observers\SignatureObserver::created()
     *
     * @param  SignatureValidator $input The form request class that is responsible for the validation
     * @return RedirectResponse
     */
    public function store(SignatureValidator $input): RedirectResponse
    {
        try { // Try to find the petition and store/attach the signature to it.
            $petition = Fragment::whereSlug('petition')->firstOrFail();
            $signature = new Signature($input->all());

            if ($petition->signatures()->save($signature)) { // Signature has been saved and attached.
                $this->flashMessage->success('We have saved your signature.', 'Petition signed!')->important();
            }
        }

        catch (ModelNotFoundException $exception) { // Could not attach/store the signature or find the petition.
            $this->flashMessage->danger('Oops! Something went wrong');
        }

        return redirect()->route('petition.index');
    }
}
