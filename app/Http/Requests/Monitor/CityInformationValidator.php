<?php

namespace App\Http\Requests\Monitor;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CityInformationValidator
 *
 * @package App\Http\Requests\Monitor
 */
class CityInformationValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Returns true because the authorization is handled with the controller middleware.
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
            'name'      => 'required|string|max:191',
            'province'  => 'required',
            'lat'       => 'required|string',
            'lng'       => 'required|string'
        ];
    }
}
