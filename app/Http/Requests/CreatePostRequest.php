<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required',  'max:255'],
            'body' => ['max:1000'],
            'image' => ['required']
        ];
    }
    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'your post needs a title.',
            'title.max' => 'the title is too long. ',
            'body.max' => 'the description is to long. ',
            'image.required' => 'your post needs an image.',
        ];
    }
}
