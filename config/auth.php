<?php

return [
    'datasource' => env('AUTH_DRIVER', 'db'), // db or file
    'roles' => ['user', 'admin'],
    'login_path' => '/login',
];
