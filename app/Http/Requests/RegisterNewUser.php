<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterNewUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ? strtolower($this->name) : '',
            'username' => $this->username ? strtolower($this->username) : '',
            'email' => $this->email ? strtolower($this->email) : '',
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:20'],
            'username' => ['required', 'min:3', 'max:15', 'unique:users,username'],
            'email' => ['required', 'max:50', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6', 'max:100']
        ];
    }
    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            'name.required' => __('forms.name.required'),
            'name.min' => __('forms.name.min', ['min' => 1]),
            'name.max' => __('forms.name.max', ['max' => 20]),

            'username.required' => __('forms.username.required'),
            'username.min' => __('forms.username.min', ['min' => 3]),
            'username.max' => __('forms.username.max', ['max' => 15]),
            'username.unique' => __('forms.username.unique'),

            'email.required' => __('forms.email.required'),
            'email.max' => __('forms.email.max', ['max' => 50]),
            'email.email' => __('forms.email.email'),
            'email.unique' => __('forms.email.unique'),

            'password.required' => __('forms.password.required'),
            'password.confirmed' => __('forms.password.confirmed'),
            'password.min' => __('forms.password.min'),
            'password.max' => __('forms.password.max'),
        ];
    }
}