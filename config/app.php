<?php

return [
    'name' => env('APP_NAME', 'Colibri'),
    'debug' => env('APP_DEBUG', false),
    'timezone' => env('APP_TIMEZONE', 'America/Montreal'),
    'https' => env('APP_HTTPS', false),
    'title_format' => ':title | :site', // :title, :site available

    'log' => [
        'channel' => env('LOG_CHANNEL', 'daily'), // 'single' or 'daily'
        'level' => env('LOG_LEVEL', 'debug'),     // debug, info, warning, error
        'max_files' => 30,                        // days to keep (daily only)
    ],
];
