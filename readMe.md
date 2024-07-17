# Apollo

This is a PHP application built with a custom routing system, Blade templating engine, CSRF protection, and form validation. It utilizes various libraries.

## Requirements

- PHP >= 7.1.3
- Composer

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/sainaylinthar/Apollo.git
    cd Apollo
    ```

2. Install the dependencies:

    ```bash
    composer install
    ```

3. Set up your environment variables:

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database configuration and other settings.

4. Run the application:

    ```bash
    php -S localhost:8000 -t public
    ```

## Features

- **Routing**: Utilizes Altorouter for defining and managing routes.
- **Templating**: Uses the Philo Laravel Blade package for templating.
- **Error Handling**: Filp/Whoops is used for handling and displaying errors.
- **Database**: Illuminate Database is used for database operations.
- **Validation**: Illuminate Validation is used for form validation.
- **Events**: Illuminate Events is used for event handling.
- **CSRF Protection**: Custom implementation of CSRF token generation and validation.
- **Pagination**: Voku Pagination is used for paginating data.
- **Utilities**: Nesbot/Carbon is used for date and time operations.

## Directory Structure

```
Apollo/
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   └── functions/
│       └── helpers.php
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   └── views/
├── routes/
├── storage/
├── vendor/
├── .env
├── .env.example
├── composer.json
├── composer.lock
└── README.md
