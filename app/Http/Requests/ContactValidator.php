<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ContactValidator
 *
 * @package App\Http\Requests
 */
class ContactValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // This variable is true Because the validation nor the method.
        // Doesn't need any authorization to perform in the application.
        
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
            'firstname' => 'required|string|max:191',
            'lastname'  => 'required|string|max:191',
            'email'     => 'required|string|email|max:191',
            'message'   => 'required|string'
        ];
    }
}
