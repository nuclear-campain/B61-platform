<?php

namespace App\Http\Requests\Petition;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SignatureValidator
 *
 * @package App\Http\Requests\Petition
 */
class SignatureValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // No authorization needed because this is a validator
        // For an open route that can basically user by every on that uses the application.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname'     => 'required|string|max:30',
            'lastname'      => 'required|string|max:80',
            'email'         => 'required|string|email|max:191|unique:signatures',
            'postal'        => 'required|integer|max:9999',
            'city'          => 'required|string|max:90',
            'country'       => 'required|string|max:30',
        ];
    }
}
