<?php

return [
    'driver' => env('MAIL_DRIVER', 'log'), // smtp, sendmail, log
    'host' => env('MAIL_HOST', 'localhost'),
    'port' => (int) env('MAIL_PORT', 587),
    'username' => env('MAIL_USER', ''),
    'password' => env('MAIL_PASS', ''),
    'encryption' => env('MAIL_ENCRYPTION', 'tls'), // tls, ssl, null
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'noreply@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Colibri'),
    ],
];
