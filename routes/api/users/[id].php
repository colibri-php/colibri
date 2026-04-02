<?php

$users = [
    1 => ['id' => 1, 'name' => 'Alice'],
    2 => ['id' => 2, 'name' => 'Bob'],
];

$id = (int) $params['id'];

if (! isset($users[$id])) {
    return Colibri\Http\Response::json(['error' => 'User not found'], 404);
}

return $users[$id];
