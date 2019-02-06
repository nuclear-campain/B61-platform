<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateValidator;
use App\Notifications\LoginCreated;
use App\User;
use Gate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mpociot\Reanimate\ReanimateModels;
use Spatie\Permission\Models\Role;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers\Account
 */
class UsersController extends Controller
{
    use ReanimateModels;

    /**
     * UsersController constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware(['auth', 'role:admin']); // Because of the middleware we don't need any gates in the view.
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
        return view('users.create', compact('roles'));
    }

    /**
     * Method for creating a new user in yhe application.
     *
     * @param  UserValidator $input The form request class that handles the validation.
     * @param  User          $user  The model entity from the storage in the application.
     * @return RedirectResponse
     */
    public function store(CreateValidator $input, User $user): RedirectResponse
    {
        $input->merge(['password' => str_random(16)]);

        if ($user = $user->create($input->all())) {
            $user->notify((new LoginCreated($input->all()))->delay(now()->addMinute()));
            $this->flashMessage->success("The login for {$user->name} has been created")->important();
        }

        return redirect()->route('users.web.dashboard');
    }

    /**
     * Method for deleting users in the application as admin.
     *
     * @todo Build up the account.delete view.
     *
     * @param  Request $request     The request instance that holds all the request information.
     * @param  User    $user        The entity form the user in the storage.
     * @return View|RedirectResponse
     */
    public function destroy(Request $request, User $user)
    {
        if ($request->method() === 'GET') {
            $viewPath = (Gate::allows('same-user', $user)) ? 'account.delete' : 'users.delete';
            return view($viewPath, compact('user'));
        }

        // Method is not identified as GET request DELETE
        $this->validate($request, ['confirmation' => 'required']); // Confirm that the confirmation field is filled in.
        $user->processDeleteRequest($request);

        return redirect()->route('users.web.dashboard');
    }

    /**
     * Undo the delete for the user in the application.
     *
     * @param  int $user The unique resource entity identifier from the user.
     * @return RedirectResponse
     */
    public function undoDeleteRoute(int $user): RedirectResponse
    {
        $user = User::onlyTrashed()->findOrfail($user);

        $this->flashMessage->info('The login has been restored');
        return $this->restoreModel($user->id, new User(), 'users.web.dashboard');
    }
}
