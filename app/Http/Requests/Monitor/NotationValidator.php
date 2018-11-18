<?php

namespace App\Http\Requests\Monitor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class NotationValidator
 * 
 * @package App\Http\Requests\Monitor
 */
class NotationValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // This variable is registered as true because the controller 
        // Handles the authorization check.

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return ['title' => 'required|string|max:191', 'description' => 'required'];
    }
}
