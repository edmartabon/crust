<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Crust route
    |--------------------------------------------------------------------------
    |
    | Enable or disable crust user and role management.
    | (Administrator user and user tool)
    |
    */

    'page' => true,

    /*
    |--------------------------------------------------------------------------
    | Crust Login Redirection
    |--------------------------------------------------------------------------
    |
    | Redirect user after successful login
    | base on role
    |
    */

    'redirect' => [
        'administrator' => '/crust',
        'manager'       => '/manager',
    ],

];
