<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'email' => [
        'host' => env('MAIL_HOST', 'smtp.example.com'),
        'auth' => env('MAIL_SMTP_AUTH', true),
        'username' => env('MAIL_USERNAME', 'username@example.com'),
        'password' => env('MAIL_PASSWORD', 'password'),
        'port' => env('MAIL_PORT', 587),
    ],
];
