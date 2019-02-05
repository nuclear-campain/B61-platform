<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;

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
