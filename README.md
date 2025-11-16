<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# 📚 Laravel Books API

A simple RESTful API built with Laravel that manages a collection of books.
Features include CRUD operations, validation, query filtering, sorting, and JSON API responses.

# 🚀 Features

-Create, read, update, and delete books
-Input validation using Laravel’s Validator
-JSON Resource formatting
-Query parameters for filtering (title, author, year)
-Sorting support
-Proper HTTP status codes
-Clear error messages

# 🛠 Requirements

-PHP 8.1+
-Composer
-Laravel 10+
-MySQL / phpMyAdmin via Laragon

# ⚙️ Installation:
git clone <https://github.com/Joe-Zupo/testAPI>
cd your-project
composer install
cp .env.example .env
php artisan key:generate

## Configure .env:
### Update database credentials:
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=

Run migrations:
php artisan migrate

Start Server:
php artisan serve

# 📂 Book Model Structure

### Each Book record contains:

Field:	           Type:
id         =>          integer
title      =>          string
author =>           string
year     =>           integer
created_at     => datetime
updated_at    => datetime


# 📡 API Endpoints
## 1. Get All Books

### GET /api/books

Supports optional filters:

- Query Param	Description
- title	Filter by title (partial allowed)
- author	Filter by author (partial allowed)
- year	Filter by exact year
- sort	Sort by a field (ex: sort=title)

Example:

GET /api/books?title=Lord&sort=year

## 2. Get One Book

### GET /api/books/{id}

Success Response (200):

{
  "id": 1,
  "title": "Book Title",
  "author": "Author",
  "year": 2020
}

## 3. Create a Book

### POST /api/books

Body (JSON):

{
  "title": "New Book",
  "author": "Someone",
  "year": 2022
}


Success Response (201):

{
  "message": "Book Created Successfully",
  "data": { ...book }
}


Validation Errors (422):

{
  "message": "Fields have wrong input!",
  "error": {
    "title": ["The title field is required"]
  }
}

## 4. Update a Book

### PUT /api/books/{id}

Body (JSON): (all fields optional)

{
  "title": "Updated Title"
}


Success Response (200):

{
  "message": "Product updated successfully!",
  "data": { ...updated_book }
}

## 5. Delete a Book

### DELETE /api/books/{id}

Success Response (200):

{
  "message": "Book Deleted",
  "data": { ...deleted_book }
}


Not Found (404):

{
  "message": "No Book Found"
}


Not Found (404):

{
  "message": "No Book Found"
}
