<?php

use Colibri\Database\DB;
use Colibri\Database\Interfaces\MigrationInterface;

return new class implements MigrationInterface {
    public function up(): void
    {
        DB::exec('
            CREATE TABLE users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                email TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL,
                name TEXT NOT NULL DEFAULT "",
                role TEXT NOT NULL DEFAULT "user",
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )
        ');
    }

    public function down(): void
    {
        DB::exec('DROP TABLE IF EXISTS users');
    }
};
