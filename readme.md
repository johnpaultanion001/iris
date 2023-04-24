# Laravel Setup

#### Create a environment file using this command-
```bash
cp .env.example .env
```

#### Update these settings in the .env file:

-   DB_DATABASE (your local database, i.e. "iris")
-   DB_USERNAME (your local db username, i.e. "root")
-   DB_PASSWORD (your local db password, i.e. "")
-   HASHIDS_SALT (use the app key or match the variable used in production)

#### Install PHP dependencies:

```bash
composer update
```

_If you don't have Composer installed, [instructions here](https://getcomposer.org/)._

#### Generate an app key:

```bash
php artisan key:generate
```

#### Generate JWT keys for the .env file:

```bash
php artisan jwt:secret
```

#### Run the database migrations:

```bash
php artisan migrate:fresh --seed
```

#### Run an initial build:

```bash
php artisan serve
```

#### Seeded User

After seeding the database, you can log in with these credentials:

Email: `admin@gmail.com`
Password: `password`

**Laravel Docs:**

[https://laravel.com/docs/](https://laravel.com/docs/)
