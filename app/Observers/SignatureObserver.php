<?php

namespace App\Observers;

use App\Models\Postal;
use App\Models\Signature;

/**
 * Class SignatureObserver
 *
 * @package App\Observers
 */
class SignatureObserver
{
    /**
     * Handle the signature "created" event.
     *
     * @param  Signature  $signature  The database entity from the created petition signature
     * @return void
     */
    public function created(Signature $signature)
    {
        $postal = request()->postal;
        $postalDb = Postal::whereCode($postal)->firstorFail();

        $signature->city()->associate($postalDb)->save();
    }
}
