# Ticketing Application (Backend Project)

A Laravel-based ticketing backend application that provides RESTful APIs for authentication, product management, category management, and order management.
This project was developed as a backend project using Laravel and is designed to support a mobile application built with Flutter.

# Overview
The application provides a backend system for managing ticketing-related data and transactions through RESTful APIs.
The API uses Laravel Sanctum for authentication and protects application resources using authenticated routes.

# Features #
# Authentication
- User registration
- User login
- Token-based authentication using Laravel Sanctum
- User logout
- Protected API routes

# Product Management
- Retrieve products
- Filter products by status
- Sort products by favorite status
- Retrieve product data with its category
- Create products
- Update product name and price
- Delete products
- Product image upload

# Category Management
- Retrieve categories
- Sort categories alphabetically
- Create new categories

# Order Management
- Create orders
- Store transaction information
- Store order items
- Calculate order item totals based on quantity
- Associate order items with products

# Tech Stack
- PHP
- Laravel 11
- Laravel Sanctum
- Eloquent ORM
- RESTful API
- MySQL
- Postman
- Git & GitHub

# API Authentication
This projec uses Laravel Sanctum to authenticate users.
Authentication flow:
1. User registers an account.
2. User logs in through the /api/login endpoint.
3. The server authenticates the user.
4. Protected endpoints require a valid Sanctum authentication token.
5. The user can log out through the /api/logout endpoint.

# Installation
1. Clone the repository
git clone https://github.com/AlyaArilda/Ticketing.git
2. Navigate to the project directory
cd Ticketing
3. Install PHP dependencies
compeser install
4. Install frontend dependencies
npm install
5. Create environment file
cp .env.example .env
6. Generate Application key
php artisan key:generate
7. Configure the database
Update the database configuration in the .env file:
DB_DATABASE=ticketinglaravel
DB_USERNAME=root
DB_PASSWORD=
8. Run database migrations
php artisan migrate
9. Start the laravel development serve
php artisan serve
The application will be available at:
http://127.0.0.1:8000


# API Testing
You can test the API using Postman.
Recommended flow:
Register -> Login -> Get Authentication Token -> Send Token to Protected Endpoints -> Products / Categories / Orders

Example protected request header:
Authorization: Bearer YOUR_TOKEN
Accept: application/json

# Main Laravel Concepts Used
This project demonstrates practical use of::
Laravel MVC architecture
RESTful API development
Laravel API Resource Controllers
Eloquent ORM
Laravel Sanctum authentication
Middleware
Request validation
CRUD operations
Database migrations
API authentication
Backend integration with mobile applications

# What I Learned
- Building RESTful APIs using Laravel
- Implementing token-based authentication
- Protecting API endpoints with middleware
- Working with Eloquent relationships
- Handling product and category data
- Processing orders with multiple order items
- Validating API requests
- Handling file uploads
- Testing APIs using Postman
- Structuring backend code using Laravel controllers and models


Project Status

-In Development-