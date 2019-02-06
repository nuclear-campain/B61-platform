<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseRequest;

/**
 * Class CreateValidator
 *
 * @package App\Http\Requests\Users
 */
class CreateValidator extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->auth->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:191',
            'role'  => 'required|string',
            'email' => 'required|string|email|max:191|unique:users'
        ];
    }
}
