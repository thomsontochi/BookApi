# BookApi
This a REST API that calls an external API service to get information about books with a simple CRUD (Create, Read, Update, Delete) API with a local database of mysql External API used is Ice And Fire API


Laravel was used to develop the application because it is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

Simple, fast routing engine.
Powerful dependency injection container.
Multiple back-ends for session and cache storage.
Expressive, intuitive database ORM.
Database agnostic schema migrations.
Robust background job processing.
Real-time event broadcasting.
Laravel is accessible, powerful, and provides tools required for large, robust applications.

Project Setup
In order to setup the application locally on you system.

clone the repository
git clone
cd into the project directory
cd books-api
install the dependencies for the application
composer install
create a .env file from the .env.example
cp .env.example .env
Generate an application key
php artisan key:generate
