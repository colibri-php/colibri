# Colibri

A lightweight file-based PHP micro-framework.

## Features

- **File-based routing** — `routes/web/` for HTML pages, `routes/api/` for JSON endpoints. No route registration, just create files.
- **Three rendering modes** — `.latte` (static), `.php` (logic), `.php` + `.latte` twins (variables auto-injected)
- **Cascading conventions** — `_middleware.php`, `_styles.css`, `_scripts.js` inherit from parent directories
- **Latte templating** — auto-layouts, custom tags (`{page}`, `{t}`, `{image}`, `{meta}`, `{styles}`, `{scripts}`, `{pagination}`, `{alerts}`)
- **i18n** — JSON translation files, `t()` helper, locale prefixes in URLs, language switcher
- **Database** — Medoo DBAL with `DB::` facade, migrations, pagination
- **Flat-file storage** — `Data::` for JSON-based content, works without a database
- **Authentication** — session-based with `Auth::`, supports DB and file drivers
- **Middleware** — built-in auth, CSRF, CORS, rate limiting, security headers
- **Cache** — file or DB driver, configurable TTL
- **Mail** — PHPMailer with SMTP, sendmail, and log drivers. Latte templates for emails.
- **Image processing** — resize, crop, thumbnail with automatic caching
- **HTMX support** — partial rendering, HX headers, `$htmx` template variable
- **Vite integration** — optional, for Tailwind/Vue/Svelte projects
- **SEO** — `{meta}` tag, OpenGraph, Twitter Cards, canonical, `site_title()`
- **CLI** — extensible commands: `serve`, `migrate`, `make:page`, `cache:clear`, `down`/`up`
- **Driver pattern** — extensible via `registerDriver()` for mail, cache, auth (and future storage, log)
- **PHP 8.4** — property hooks, asymmetric visibility

## Requirements

- PHP >= 8.4
- Extensions: `pdo`, `intl`, `mbstring`, `fileinfo`

## Quick Start

```bash
composer create-project colibri-php/colibri my-project
cd my-project
php colibri serve
```

Visit `http://localhost:8000`.

## Project Structure

```
my-project/
├── colibri              # CLI entry point
├── config/              # Configuration files
├── core/                # Framework source (becomes vendor package after split)
├── data/                # Flat-file JSON storage
├── locales/             # Translation files (en.json, fr.json)
├── middleware/           # Custom middleware (anonymous classes)
├── migrations/           # Database migrations
├── public/              # Web root (index.php, .htaccess)
├── routes/
│   ├── web/             # HTML pages (.php, .latte)
│   └── api/             # JSON endpoints (.php)
├── storage/
│   ├── cache/           # Cache files
│   ├── logs/            # Log files
│   └── uploads/         # Uploaded files
├── templates/
│   ├── layouts/         # Latte layouts (default.latte)
│   ├── partials/        # Reusable partials (pagination, alerts)
│   ├── emails/          # Email templates
│   └── errors/          # Error pages (404, 500, 503)
└── tests/               # Project tests
```

## Routing

Create a file, get a route:

```
routes/web/about.latte       → GET /about
routes/web/blog/[slug].latte → GET /blog/my-post
routes/api/users/index.php   → GET /api/users
routes/api/users/[id].php    → GET /api/users/42
```

### HTTP Methods

```php
// routes/api/posts/index.php
return [
    'GET' => fn($request, $params) => DB::select('posts', '*'),
    'POST' => fn($request, $params) => DB::insert('posts', $request->body()),
];
```

## Templating

```latte
{page title: t('homepage'), layout: 'admin'}

{block content}
<h1>{t 'welcome'}</h1>
{image 'photos/hero.jpg', resize: 800, alt: 'Hero'}
{pagination $posts}
{/block}
```

## Configuration

All config via `.env` and `config/*.php`:

```env
APP_NAME=MyApp
APP_DEBUG=true
DB_DRIVER=sqlite
AUTH_DRIVER=db       # or 'file' for no-database mode
CACHE_DRIVER=file    # or 'db'
MAIL_DRIVER=log      # or 'smtp'
```

## Works Without a Database

Set `AUTH_DRIVER=file` and use `Data::` instead of `DB::` — Colibri runs entirely on flat files.

## CLI

```bash
php colibri serve              # Development server
php colibri migrate            # Run migrations
php colibri make:page about    # Create a page
php colibri make:api users     # Create an API endpoint
php colibri cache:clear        # Clear caches
php colibri down               # Maintenance mode
php colibri routes             # List all routes
```

## License

MIT
