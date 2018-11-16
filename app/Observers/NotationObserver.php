<?php

namespace App\Observers;

use App\Models\Notation;

/**
 * Class NotationObserver 
 * 
 * @package App\Observers
 */
class NotationObserver
{
    /**
     * Handle the notation "created" event.
     *
     * @param  Notation  $notation The notation entity that has been created in the storage. 
     * @return void
     */
    public function created(Notation $notation): void
    {
        $user = auth()->user();
        $notation->author()->associate($user)->save();
    }
}
