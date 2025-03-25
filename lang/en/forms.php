<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Form Error Messages
    |--------------------------------------------------------------------------
    */

    'name' => [
        'required' => 'You must provide a name.',
        'min' => 'The name must be at least :min character.',
        'max' => 'The name must not exceed :max characters.',
    ],

    'username' => [
        'required' => 'You must provide a username.',
        'min' => 'The username must be at least :min character.',
        'max' => 'The username must not exceed :max characters.',
        'unique' => 'The username already exists.',
    ],

    'email' => [
        'required' => 'You must provide an email address.',
        'max' => 'The email must not exceed :max characters.',
        'email' => 'The email must be a valid email address.',
        'unique' => 'The email is already taken.',
    ],

    'password' => [
        'required' => 'You must provide a password.',
        'confirmed' => 'The passwords do not match.',
        'min' => 'The password must be at least 6 characters.',
        'max' => 'The password must not exceed 100 characters.',
    ],
];
