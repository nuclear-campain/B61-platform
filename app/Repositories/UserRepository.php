<?php

namespace App\Repositories;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository extends Authenticatable
{
    /**
     * UserRepository Constructor.
     *
     * @param  array $attributes. Variables for form input attributes to create a new record.
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * Function for processing deletion requests (users)
     *
     * @throws \Exception instance of ModelNotFoundException when the user is not found.
     *
     * @param  Request $request The request information collection bag.
     * @return void
     */
    public function processDeleteRequest(Request $request): void
    {
        if ($this->validateRequest($request->confirmation) && $this->delete()) {
            // Confirmation is valid && User has been deleted in the system.
            $undoLink = '<a href="'. route('users.delete.undo', $this) .'" class="no-underline">undo</a>';

            $flashMessage = new FlashRepository;
            $flashMessage->warning("The login for {$this->name} has been deleted. " . $undoLink)->important();
        }
    }

    /**
     * Confirm that the value from the confirmation input is the same as the auth user his password.
     *
     * @param  string $password The user given password from the form.
     * @return bool
     */
    private function validateRequest(string $password): bool
    {
        return Hash::check($password, auth()->user()->getAuthPassword());
    }
}
