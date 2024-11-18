<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users', // For admins/customers
    ],
    'restaurant' => [
        'driver' => 'session',
        'provider' => 'restaurants', // For sellers
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\Registration::class, // Registration model
    ],
    'restaurants' => [
        'driver' => 'eloquent',
        'model' => App\Models\Restaurant::class, // Restaurant model for sellers
    ],
],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'restaurants' => [
            'provider' => 'restaurants',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
