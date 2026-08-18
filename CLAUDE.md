# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

**Initial setup:**
```bash
composer run setup
```
This installs PHP and JS dependencies, generates the app key, runs migrations, and builds frontend assets.

**Development server (PHP + Vite together):**
```bash
composer run dev
# or separately:
php artisan dev
npm run dev
```

**Run all tests:**
```bash
composer run test
# or directly:
php artisan test
```

**Run a single test:**
```bash
php artisan test --filter TestClassName
php artisan test tests/Feature/ExampleTest.php
```

**Code formatting (Laravel Pint):**
```bash
./vendor/bin/pint
```

**Frontend build:**
```bash
npm run build
```

**Database migrations:**
```bash
php artisan migrate
php artisan migrate:fresh --seed
```

## Architecture

This is a fresh **Laravel 13** skeleton app (PHP 8.3+). The application is configured via `bootstrap/app.php` using Laravel's fluent `Application::configure()` API — middleware, routing, and exception handling are all wired there rather than in separate `Kernel` classes (the Laravel 11+ style).

**Database:** SQLite by default (`database/database.sqlite`). Tests use an in-memory SQLite instance (configured in `phpunit.xml`) — no external database needed for testing.

**Frontend:** Vite with `laravel-vite-plugin`, Tailwind CSS v4 (via `@tailwindcss/vite`), and Bunny-hosted fonts. Entry points are `resources/css/app.css` and `resources/js/app.js`.

**Routes:** Only `routes/web.php` and `routes/console.php` are registered. API routes are not configured by default, but `bootstrap/app.php` auto-renders JSON responses for requests to `api/*` paths.

**Dev tooling included:** `laravel/pint` (formatter), `laravel/pail` (log tailing), `laravel/pao` (artisan dev command orchestration).
