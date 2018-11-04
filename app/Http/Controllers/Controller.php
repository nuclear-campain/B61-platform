<?php

namespace App\Http\Controllers;

use App\Repositories\FlashRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->flashMessage = new FlashRepository;
    }
}
