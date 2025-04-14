<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', 'min:6', 'max:100']
        ];
    }

    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [

            'password.required' => 'the current password is required.',
            'password.current_password' => 'The current password is incorrect.',
            'new_password.required' => 'the new password is required.',
            'new_password.confirmed' => __('forms.password.confirmed'),
            'new_password.min' => __('forms.password.min', ['min' => 6]),
            'new_password.max' => __('forms.password.max', ['max' => 100]),
        ];
    }
}
