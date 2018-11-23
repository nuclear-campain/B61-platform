<?php

namespace App\Http\Controllers\Monitor\Status;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class RejectController
 * 
 * @package
 */
class RejectController extends Controller
{
    public function __construct()
    {
        parent::__construct(); 
        $this->middleware(['auth', 'role:admin']);
    }
}
