# Bookshelf API

A Laravel-based REST API for managing books, authors, and genres with role-based access control.

## Features

-   **Books Management**: Create, read, update, delete books with title, ISBN, and description
-   **Authors Management**: Manage book authors with full CRUD operations
-   **Genres Management**: Organize books by genres
-   **Authentication**: User login/logout with API tokens using Laravel Sanctum
-   **Role-based Access**: Admin users can modify data, regular users can only view
-   **Search Functionality**: Search books by title or ISBN, authors and genres by name
-   **Relationships**: Books can have multiple authors and genres
-   **API Resources**: Consistent JSON responses with proper error handling
-   **Pagination**: Configurable pagination for list endpoints

## Installation

### Requirements

-   PHP 8.3 or higher
-   SQLite database
-   Composer

1. **Clone the repository**

```bash
git clone <repository-url>
cd bookshelf-api
```

2. **Install dependencies**

```bash
composer install
```

3. **Set up environment**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Run migrations**

```bash
php artisan migrate
```

5. **Start the server**

```bash
php artisan serve
```

## Create Test Users

Run these commands in Laravel Tinker:

```bash
php artisan tinker
```

```php
// Create admin user
App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'ateeq@ateeqend.com',
    'password' => bcrypt('password'),
    'is_admin' => true
]);

// Create regular user
App\Models\User::create([
    'name' => 'Regular User',
    'email' => 'regular@ateeqend.com',
    'password' => bcrypt('password'),
    'is_admin' => false
]);

exit
```

## Testing with Postman

1. Import `Bookshelf_API.postman_collection.json` into Postman
2. Set `base_url` variable to your local URL (e.g., `http://localhost:8000`)
3. Run the collection tests to verify all endpoints

### Available Test Requests

**Authentication:**

-   Admin Login (Get Token)
-   Regular User Login (Get Token)

**Books (Public read access, Admin-only write access):**

-   List Books (No Auth Required)
-   Get Single Book (No Auth Required)
-   Search Books by Title (No Auth Required)
-   Search Books by ISBN (No Auth Required)
-   Create Book - Regular User (Should Fail)
-   Create Book - Admin User (Success)
-   Update Book - Regular User (Should Fail)
-   Update Book - Admin User (Success)
-   Delete Book - Regular User (Should Fail)
-   Delete Book - Admin User (Success)

**Authors (Same access pattern as Books):**

-   List, Get, Search, Create, Update, Delete operations
-   Regular users: Read-only access
-   Admin users: Full CRUD access

**Genres (Same access pattern as Books):**

-   List, Get, Search, Create, Update, Delete operations
-   Regular users: Read-only access
-   Admin users: Full CRUD access

## Live Demo

The API is deployed at <a href="https://api.ateeqend.com" target="_blank">**api.ateeqend.com**</a> with a web dashboard for testing all endpoints. The deployment is automated via Github actions. As soon as a change is made in the dev branch, the deployment gets triggered on my server.

The included Postman collection is pre-configured to work with the live API without any setup (e.g. you don't need to change any variables, just download the collection, import it in your Postman and click run and it will start working).

## Implementation Details

This project was built incrementally with these key features:

-   **Database Models**: Created Book, Author, Genre models with proper relationships
-   **Authentication**: Integrated Laravel Sanctum for API token-based authentication
-   **Database Structure**: Designed migrations for books, authors, genres, and their pivot tables
-   **Data Seeding**: Added sample data through migrations for testing
-   **API Endpoints**: Built RESTful controllers for all resources
-   **Authorization**: Implemented role-based access using Laravel Policies. This will allow us to have granular control later on (e.g. if we want only those users who are the creators of a record to edit or delete them, we can easily do so via policies).
-   **Request Validation**: Custom form requests for data validation
-   **Service Layer**: BookService handles business logic separately from controllers
-   **API Resources**: Consistent JSON response formatting
-   **Configuration**: Custom API configuration for pagination and response structure
-   **Testing Tools**: Postman collection and web dashboard for endpoint testing
-   **Deployment**: Configured with Caddyfile and GitHub deployment scripts

### Key Files Overview

-   `config/api.php`: API configuration for pagination, response structure, and versioning
-   `routes/api.php`: API route definitions with versioning support
-   `app/Models/Book.php`: Book model with author and genre relationships
-   `app/Http/Requests/BookRequest.php`: Request validation with custom error handling
-   `app/Http/Controllers/API/V1/BookController.php`: RESTful controller with authorization
-   `app/Services/BookService.php`: Business logic for book operations
-   `app/Http/Resources/BookResource.php`: JSON response formatting
-   Similar for other tables (Authors, Genres etc)

## Potential Improvements

-   The CRUD operations follow similar patterns and could be abstracted into a reusable Laravel package.
-   Such a package would allow configuration per model (e.g., searchable fields) and route setup with minimal code.
-   I chose not to go this route to avoid overengineering and scope creep.
-   The `api-test.blade.php` dashboard is messy, with repetition and all logic in one file. It is violating the single responsibility principle.
-   It was added solely to simplify testing for you.
