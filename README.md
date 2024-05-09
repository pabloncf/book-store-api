# Bookstore API

This application is an API where you can register Books and Stores. Each book can belong to multiple stores, and each store can contain multiple books, forming a many-to-many relationship.

## Technologies Used
- Laravel 11
- PHP 8.2
- Sanctum for authentication
- Laradock for Docker management
- Docker
- Postgres (You can run it with MySQL, but I did with Postgres)

## Setup and Installation
1. Clone the repository.
2. Use Laradock to set up the Laravel environment with Docker.
3. Run migrations and seeders to set up the database.

## Authentication

To perform login, send a POST request to `/login` with the following credentials:

```
{
    "email": "test@test.com",
    "password": "test123"
}
```

To register a new user, send a POST request to `/register` with the following user details:

```
{
    "name": "test 1",
    "email": "test1@teste.com",
    "password": "testagain"
}
```

## Endpoints

### Books

* GET /api/books

* POST /api/books
```
{
    "name": "New Book",
    "isbn": 987654321,
    "value": 15.99
}
```

* POST /api/books/{bookId}/add-store
```
{
    "store_id": 1
}
```

* PUT /api/books/{id}
```
{
    "name": "Updated Book Title",
    "isbn": 987650000,
    "value": 20.00
}
```

* DELETE /api/books/{id}

### Stores

* GET /api/stores

* POST /api/stores
```
{
    "name": "New Store",
    "address": "456 Elm St",
    "active": true
}
```

* POST /api/store/{storeId}/add-book
```
{
    "book_id": 1
}
```

* PUT /api/stores/{id}
```
{
    "name": "Updated Store",
    "address": "456 Elm St",
    "active": false
}
```

* DELETE /api/stores/{id}

## Support
If you have any questions, feel free to email me at: pabloncf@gmail.com

