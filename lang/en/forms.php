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
        'min' => 'The password must be at least :min characters.',
        'max' => 'The password must not exceed :max characters.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Form Labels, placeholders and Possible Messages When Authenticating
    |--------------------------------------------------------------------------
    */
    'register_form' => [
        'maintitle' =>  'Create an account in TheDevHub',
        'submit_btn' => 'create',
        'input_name' => [
            'label' => 'your name',
            'placeholder' => 'enter your full name'
        ],
        'input_username' => [
            'label' => 'create a username',
            'placeholder' => 'choose a unique username'
        ],
        'input_email' => [
            'label' => 'email address',
            'placeholder' => 'enter your email address'
        ],
        'input_password' => [
            'label' => 'password',
            'placeholder' => 'create a secure password'
        ],
        'input_password_conf' => [
            'label' => 'password confirmation',
            'placeholder' => 'repeat your password'
        ],
        // messages when authenticating
        'created' => 'welcome to thedevhub :username.',
        'fail' => 'the registration has failed.',
    ]

];
