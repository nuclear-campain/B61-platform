<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\BaseRequest;

/**
 * Class InformationValidator
 *
 * @package App\Http\Requests\Account
 */
class InformationValidator extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->auth->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users,email,' . $this->auth->user()->id,
        ];
    }
}
