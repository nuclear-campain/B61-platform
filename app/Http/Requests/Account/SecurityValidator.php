<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseRequest;

/**
 * Class SecurityValidator
 *
 * @package App\Http\Requests\Account
 */
class SecurityValidator extends BaseRequest
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
    public function rules(): array
    {
        return ['password' => 'required|string|min:6|confirmed'];
    }
}
