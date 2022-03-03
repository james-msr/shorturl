<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UrlRequest extends FormRequest
{
    /**
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
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
            'real_url' => 'required|url'
        ];
    }

    /**
     * Error messages
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'real_url.required' => 'Please enter an url',
            'real_url.url' => 'Entered value must be valid url'
        ];
    }

    /**
     * Return error if validation fails
     *
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new HttpResponseException(
            response()->json([
                'error' => $error
            ])
        );
    }
}
