# Real Estate CRM

This project is a lightweight CRM built with Laravel for managing leads, projects, units, and employee interactions within a real estate environment.

## Overview

The system is designed to work as an internal platform for managing the real estate sales cycle, starting from receiving a new lead, assigning it to a sales representative, tracking interactions and status updates, and ending with reporting and statistics.

## Core Features

- Manage projects and units
- Manage leads
- Assign leads to sales users
- Record activities such as calls, WhatsApp messages, and emails
- Role-based permissions
- API ready for use with Laravel Sanctum
- Statistics for both admins and sales users

## System Roles

### Admin

- Can view all leads
- Can assign leads to sales staff
- Can view company-wide statistics
- Can manage users through the admin API

### Sales

- Can view only the leads assigned to them
- Can update the status of their own leads
- Can log activities on a lead
- Can view only their personal statistics

## Core Database Structure

### 1. Users

- id
- name
- email
- password
- role: admin or sales
- timestamps

### 2. Projects

- id
- name
- location
- timestamps

### 3. Units

- id
- project_id
- unit_number
- price
- status: available or sold
- timestamps

### 4. Leads

- id
- name
- phone (unique)
- source
- assigned_to
- status: new, contacted, interested, closed_won
- timestamps

### 5. Activities

- id
- lead_id
- user_id
- type: call, whatsapp, email
- notes
- timestamps

## Current API Endpoints

All routes are under the /api prefix.

### Authentication

- POST /api/login
- GET /api/user

### Lead Management

- POST /api/leads
- GET /api/leads
- GET /api/leads/{lead}
- PATCH /api/leads/{lead}/status
- POST /api/leads/{lead}/activities

### Admin Management

- GET /api/admin/users?role=sales
- PATCH /api/admin/leads/{lead}/assign

### Units and Statistics

- GET /api/units
- GET /api/units?status=available
- GET /api/dashboard/stats

## Expected API Behavior

- When creating a new lead, the system checks that the phone number is not duplicated.
- A new lead is created with the status new and remains unassigned initially.
- Sales users cannot modify leads that are not assigned to them.
- Activities are recorded with the user_id of the employee who added them.
- GET /api/units returns unit data along with the name of the related project.
- GET /api/leads/{lead} returns the lead with its activity timeline and the name of the user who logged each activity.

## Requirements

- PHP 8.1+
- Composer
- MySQL or any database supported by Laravel

## Quick Start

1. Install dependencies:

```bash
composer install
```

2. Copy the environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

3. Configure the database in .env:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=real_estate_crm
DB_USERNAME=root
DB_PASSWORD=
```

4. Run migrations and seed the database:

```bash
php artisan migrate --seed
```

5. Start the local server:

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

## Default Seeded Users

- Admin:
    - Email: omar@example.com
    - Password: password

- Sales:
    - Email: ibrahem@example.com
    - Password: password

## Useful Commands

- Rebuild the database with seeders:

```bash
php artisan migrate:fresh --seed
```


## Important Notes

- The system uses Laravel Sanctum for API authentication.
- Access permissions are handled through role-based logic inside the controllers and policies.
- This project is still under development and can be extended with contract management, sales tracking, and advanced reports.

## License

This project is released under the MIT License.
