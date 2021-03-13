<?php

return [
    'email' => [
        'host'     => env('MAIL_HOST', 'smtp.example.com'),
        'auth'     => env('MAIL_SMTP_AUTH', true),
        'username' => env('MAIL_USERNAME', 'username@example.com'),
        'password' => env('MAIL_PASSWORD', 'password'),
        'port'     => env('MAIL_PORT', 587)
    ]
];
