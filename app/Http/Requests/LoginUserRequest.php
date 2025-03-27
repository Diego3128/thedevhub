<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required',  'email'],
            'password' => ['required', 'string']
        ];
    }
    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            'email.required' => __('forms.email.required'),
            'email.email' => __('forms.email.email'),
            'password.required' => __('forms.password.required'),
        ];
    }
}
