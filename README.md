# Real Estate CRM

A lightweight CRM built with Laravel for managing projects, units, leads, activities, and users in real estate workflows.

## Features

- Manage projects, units, and leads
- Track activities and user actions
- Authentication and authorization (policies)
- API routes

## Requirements

- PHP 8.1+
- Composer
- MySQL or other supported database

## Quick Start

1. Install PHP dependencies:

```bash
composer install
```

2. Copy environment file and generate app key:

```bash
cp .env.example .env
php artisan key:generate
```

3. Configure database in `.env` (DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

4. Run migrations and seeders:

```bash
php artisan migrate --seed
```

5. Start the local server:

```bash
php artisan serve
```

The app will be available at http://127.0.0.1:8000 by default.

## Environment

Key environment variables to check in `.env`:

- `APP_NAME`, `APP_ENV`, `APP_DEBUG`
- `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`


## Useful Commands

- Fresh database with seeders: `php artisan migrate:fresh --seed`


## Contributing

Contributions are welcome. Please open issues or pull requests for fixes and features.

## License

This project is released under the MIT License.
