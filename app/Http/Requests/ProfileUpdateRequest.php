<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'username' => $this->username ? Str::slug(Str::lower($this->username), '-') : null,
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
            'username' => ['required', 'min:3', 'max:15', Rule::unique('users', 'username')->ignore(Auth::user()->id)],
            'image' => ['nullable', 'mimes:png,jpg,jpeg', 'max:2048'] // 2MB limit (2048 KB)
        ];
    }
    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Invalid username.',
            'username.max' => 'Username too long. Max 15 characters.',
            'username.min' => 'Username too short. At least 3 characters.',
            'username.unique' => 'Username already taken.',
            'image.mimes' => 'The image format is not valid. Only png, jpg and jpeg are valid.',
            'image.max' => 'The image size cannot exceed 2MB.',
        ];
    }
}
