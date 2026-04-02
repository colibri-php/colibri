<?php

return [
    'GET' => function ($request, $params) {
        return [
            ['id' => 1, 'title' => 'First post'],
            ['id' => 2, 'title' => 'Second post'],
        ];
    },
    'POST' => function ($request, $params) {
        return ['created' => true, 'title' => $request->input('title')];
    },
];
