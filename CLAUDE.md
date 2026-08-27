# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

A Laravel 12 backend API project. Currently minimal — only a single `GET /api/hello` endpoint and the default Laravel scaffolding (User model, migrations, seeders).

## Key Commands

```bash
# Install dependencies
composer install

# Set up environment
cp .env.example .env
php artisan key:generate
php artisan migrate

# Run the development server
php artisan serve

# Run tests
./vendor/bin/phpunit          # Full suite
./vendor/bin/phpunit tests/Feature/ExampleTest.php  # Single test file
./vendor/bin/phpunit --filter=test_name             # Single test

# Composer scripts
composer setup                # Full setup (install, env, migrate)
composer dev                  # Dev server + queue listener + pail
composer test                 # Run tests with config clear
```

## Architecture

- **Entry point**: `public/index.php` → `bootstrap/app.php` (Laravel application bootstrap)
- **Routing**: `routes/api.php` for API routes, `routes/console.php` for Artisan commands
- **Controllers**: `app/Http/Controllers/` — currently empty (only the abstract `Controller` base class)
- **Models**: `app/Models/` — `User` model with standard Laravel auth scaffolding
- **Tests**: `tests/Feature/` for HTTP/API tests, `tests/Unit/` for unit tests
- **Database**: SQLite by default (`database/database.sqlite`), migrations in `database/migrations/`
- **Config**: Standard Laravel config files in `config/` (no custom packages or drivers)

## Conventions

- PSR-4 autoloading: `App\` → `app/`, `Tests\` → `tests/`, `Database\` → `database/`
- API routes are defined in `routes/api.php` under no explicit prefix (no `api/` prefix middleware configured)
- No middleware, no service providers with custom logic — the project is a clean slate
