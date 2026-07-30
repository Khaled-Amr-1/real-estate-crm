# Real Estate CRM

A lightweight CRM built with Laravel for managing projects, units, leads, activities, and users in real estate workflows.

## Features

- Manage projects, units, and leads
- Track activities and user actions
- Authentication and authorization (policies)
- API routes and web UI scaffolding

## Requirements

- PHP 8.1+
- Composer
- MySQL or other supported database
- Node.js & npm (for frontend assets)

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

5. Install frontend dependencies and build assets:

```bash
npm install
npm run build
```

6. Start the local server:

```bash
php artisan serve
```

The app will be available at http://127.0.0.1:8000 by default.

## Environment

Key environment variables to check in `.env`:

- `APP_NAME`, `APP_ENV`, `APP_DEBUG`
- `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- Mail and queue settings if used (MAIL\_\*, QUEUE_CONNECTION)

## Testing

Run the test suite with Pest or Artisan:

```bash
./vendor/bin/pest
# or
php artisan test
```

## Useful Commands

- Fresh database with seeders: `php artisan migrate:fresh --seed`
- Run queue worker: `php artisan queue:work`
- Open tinker: `php artisan tinker`

## Contributing

Contributions are welcome. Please open issues or pull requests for fixes and features.

## License

This project is released under the MIT License.
