<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\User;
use Spatie\Permission\Models\Role;

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
     * @param  User    $users   The resource model for the users. Mapping to $users variable.
     * @return View
     */
    public function index(Request $request, User $users): View
    {
        switch ($request->get('filter')) {
            case 'deactivated': $users = $users->deactivatedUsers(); break;
            case 'deleted':     $users = $users->deletedUsers();     break;
            case 'admin':       $users = $users->adminUsers();       break;
            default:            $users;                              break;
        }

        return view('users.dashboard', ['users' => $users->simplePaginate()]);
    }

    /**
     * View for creating a new user in the application.
     *
     * @param  Role $roles The ACL roles for users in the application.
     * @return View
     */
    public function create(Role $roles): View
    {
        $roles = $roles->pluck('name', 'name'); // Duplicate attribute because the value in the form is not an integer.
        return view('users.create', compact($roles));
    }

    public function store(UserValidator $input): RedirectResponse
    {
        if ($user = new User($input->all())) {

        }
    }
}
