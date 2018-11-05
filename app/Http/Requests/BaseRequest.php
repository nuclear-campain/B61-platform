<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class BaseRequest 
 * 
 * @package App\Http\Requests
 */
class BaseRequest extends FormRequest
{
    /**
     * The authentication guard. 
     * 
     * @var Guard $auth
     */
    protected $auth;

    /**
     * Controller constructor.
     *
     * @param  Guard $auth The variable for access the authentication data.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
}
