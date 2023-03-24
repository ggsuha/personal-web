# Minimalist Personal Website

This template project is inspired by [Hugo Coder](https://github.com/luizdepra/hugo-coder/).

-   [**Requirements**](#requirement)
-   [**Installation**](#installation)
-   [**Storage Configuration**](#storage-configuration)

## Requirements

This project created with Laravel 9 and requires minimum **PHP 8.1**. You also need to install NodeJs (minimum v16) and NPM to make front end works.

## Installation

1. Clone the project
2. Install composer packages

```
composer install
```

3. Install npm packages

```
npm install
```

4. Duplicate `.env.example` to `.env`
5. Generate application key

```
php artisan key:generate
```

6. Set the database in `.env` to match with the database credential, you can configure others too.
7. Run `npm run dev` or `npm run build`

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
