# menu-api

A Laravel-based backend API server.

## Getting Started

### Install Dependencies

Generate the `vendor/` directory with all required dependencies:

```bash
composer install
```

### Configuration

Copy `.env.example` to `.env` and configure your environment variables (database, app key, etc.).

### Generate Application Key

```bash
php artisan key:generate
```

### Run Migrations

```bash
php artisan migrate
```

### Start the Development Server

```bash
=======
Or run the full setup (install, env setup, and migrations):

```bash
composer setup
```

### Configuration

Create `.env` from `.env.example` and configure your environment variables (database, app key, etc.):

```bash
cp .env.example .env
```

### Generate Application Key

```bash
php artisan key:generate
```

### Run Migrations

```bash
php artisan migrate
```

### Start the Development Server

```bash
php artisan serve
```

### API Endpoints

- `GET /api/hello` — Returns a hello message (JSON response)

## Development

### Run Tests

```bash
./vendor/bin/phpunit
```
