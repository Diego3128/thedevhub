<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Mensajes de error de formularios
    |--------------------------------------------------------------------------
    */

    'name' => [
        'required' => 'Debes proporcionar un nombre.',
        'min' => 'El nombre debe tener al menos :min carácter.',
        'max' => 'El nombre no debe exceder los :max caracteres.',
    ],

    'username' => [
        'required' => 'Debes proporcionar un nombre de usuario.',
        'min' => 'El nombre de usuario debe tener al menos :min carácter.',
        'max' => 'El nombre de usuario no debe exceder los :max caracteres.',
        'unique' => 'El nombre de usuario ya existe',
    ],

    'email' => [
        'required' => 'Debes proporcionar una dirección de correo electrónico.',
        'max' => 'El correo electrónico no debe exceder los :max caracteres.',
        'email' => 'Debes proporcionar una dirección de correo electrónico válida.',
        'unique' => 'El correo ya está registrado.',
    ],

    'password' => [
        'required' => 'Debes proporcionar una contraseña.',
        'confirmed' => 'Las contraseñas no coinciden.',
        'min' => 'La contraseña debe tener al menos 6 caracteres.',
        'max' => 'La contraseña no debe exceder los 100 caracteres.',
    ],
];
