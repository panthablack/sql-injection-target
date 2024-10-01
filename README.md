# SQL Injection Target

## Description

A simple Laravel app to act as the target for SQL injection attacks.

## Prerequisites

This app assumes you have a suitable environment for running a Laravel application, e.g.,

-   **PHP v8.2** or above.
-   Recent version of **Composer**.
-   Recent version of **Node.js** with **npm** or **yarn**. (The lock file is currently assuming yarn.)
-   **MySQL** (or other compatible database set up).

See the Laravel docs for additional help.

## Setup

-   Clone the repo and `cd` in to project folder.

```bash
git clone https://github.com/panthablack/sql-injection-target.git

cd ./sql-injection-target
```

-   Make an env file from the example. (Make sure to update the database fields with the correct info.)

```bash
cp ./.env.example ./.env
```

-   Install dependencies for the back end.

```bash
composer install
```

-   Install dependencies for the front end.

```bash
yarn
```

-   Generate a new application key. (This is used for encryption, so must be done before the database is seeded.)

```bash
cp php artisan key:generate
```

-   Run the DB migrations and seed DB.

```bash
php artisan migrate:fresh --seed
```

-   Enjoy!

## Development

-   Build front end assets and hot reload.

```bash
yarn dev
```

-   Serve the application locally

```bash
php artisan serve
```

## Production

-   **_Don't use this in production as it is deliberately broken and insecure!_**
