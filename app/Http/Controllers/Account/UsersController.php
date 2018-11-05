<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\User;

/**
 * Class UsersController
 * 
 * @package App\Http\Controllers\Account 
 */
class UsersController extends Controller
{
    /**
     * UsersController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        parent::__construct();
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Get the index panel for all the users in the application. 
     * 
     * @param  Request $request The request information bag used for filtering the users from the application. 
     * @param  Users   $users   The resource model for the users. Mapping to $users variable.  
     * @return View
     */
    public function index(Request $request, User $users): View
    {
        $users->query(); // Initiate a new users Query instance for the storage. 

        switch ($request->get('filter')) {
            case 'deactivated': $users->deactivatedUsers(); break; // Get only the users that are locked out in the app. 
            case 'deleted':     $users->deletedUsers();     break; // Get only the deleted user logins. 
            case 'admin':       $users->adminUsers();       break; // Get only the application admin users. 
            default:            $users = $users;            break; // No valid filter is given or the user wants all the users.
        }

        return view('users.dashboard', ['users' => $users->simplePaginate()]);
    }

    public function create(): View
    {
        return view('users.create');
    }
}
