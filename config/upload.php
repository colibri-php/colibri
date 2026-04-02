<?php

return [
    'max_size' => 10 * 1024 * 1024, // 10 MB
    'allowed_types' => ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'application/pdf'],
    'blocked_extensions' => ['php', 'phtml', 'phar', 'exe', 'bat', 'sh'],
];
