<p align="center">
    <img align="center" src="https://github.com/kristofferjimenez/SmylenDream/blob/master/public/images/symlendream-logo.png" width="300" alt="SmylenDream" title="SmylenDream">
</p>


## Smylen Dream Website

### Framework Documentations

* [Bootstrap 4.3](https://getbootstrap.com/) for frontend
* [Laravel 5.7](https://laravel.com/) for backend

### Content Management System

* Upload Products
* Upload Blog Posts

### Setup

1. Clone Repository
> git clone https://github.com/kristofferjimenez/SmylenDream.git
2. Composer Install
> composer install
3. Generate Key
> php artisan key:generate
4. Setup .env
    * Open the file .env

    * Edit values to match your database

    * Add empty database using phpmyadmin

    * Include that name in the DB_DATABASE

> DB_HOST=localhost

> DB_DATABASE=smylen_db

> DB_USERNAME=root

> DB_PASSWORD=

5. Migrate
> php artisan migrate
6. Run
> php artisan run
