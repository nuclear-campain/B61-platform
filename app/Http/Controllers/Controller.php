<?php

namespace App\Http\Controllers;

use App\Repositories\FlashRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Spatie\Permission\Guard;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The autentication guard.
     *
     * @var Guard $auth
     */
    protected $auth;

    /**
     * Controller constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->flashMessage = new FlashRepository;
        $this->auth = auth(); // Bind the authentication instance.
    }
}
