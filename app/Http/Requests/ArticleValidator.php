<?php

namespace App\Http\Requests;

/**
 * Class ArticleValidator
 *
 * @package App\Http\Requests
 */
class ArticleValidator extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->auth->check() && $this->auth->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:191',
            'content' => 'required',
        ];
    }
}
