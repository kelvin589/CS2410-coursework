# animal-sanctuary
University coursework to develop an animal sanctuary website using Laravel and MySQL database

## Table of Contents
* [Introduction](#introduction)
* [Features](#features)
* [Possible Improvements](#possible-improvements)
* [Technologies](#technologies)
* [Setup](#setup)

## Introduction
This project was created for University coursework. This project entailed designing and developing a three-tier dynamic database-driven web application for animal adoptions. This could have been created using any server-side and front-end technologies, as long as you know how to use them. Various technologies were taught for the module, including: Node.js, MongoDB, Mongoose ODM, PHP 8, PDO, HTML, Composer, Laravel, Blade, Eloquent. I chose to go the Laravel route with MySQL database.  

The project has been deployed to Heroku and can be accessed [here](https://mysterious-dusk-05193.herokuapp.com), using the following login details:
* Admin User
  * Username: admin@sanctuary.com
  * Password: 12345678
* Normal User
  * Username: Lincoln@Bartell.com
  * Password: 12345678

## Features
I have included all the features and stretchers specified in the brief, of which include:
* Database
  * Database to store users, animals and adoption requests with proper relations and constraints
  * Users should have a username and password, and any other relevant information
  * Animals should have a name, date of birth, description, picture and availability, and any other relevant information
  * One user can adopt multiple animals
  * One animal can only be adopted by one user
  * Multiple users can make their own adoption request to the same animal
  * Staff members can choose which adoption requests get approved
* Interface Design
  * Easy and convenient to use
  * Readable with appropriate text font, size, colour and background colour
  * Descriptive links
  * Output and information has adequate descriptive text and a neat, clear format
* Functional Requirements
  * Public users can:
    * Register a new account
    * Login with a home page showing a list of animals available for adoption
    * Make an adoption request
    * View all their adoption requests and the status of the request (approved, denied or pending)
  * Staff users can:
    * Login with a home page showing a list of all pending adoption requests
    * Approve or deny an adoption request
    * Add a new animal to the system, listed as available for adoption
    * See a list of all animals in the system and show who owns each of them (if they have been adopted)
    * View all adoption requests made by all users and the status of the request (approved, denied or pending) 
* Security
  * Authentication/authorisation
  * Form validation
  * Handling injections (SQL/HTML)
  * Password hashing
  * Restricting file upload to only images
  * Preventing Cross-site Request Forgery
* Stretchers
  * Allow for the displaying tables to be sorted based on headings
  * Allow an animal to have multiple pictures
  * Allow different animal types and support listing of animals of a selected type

## Possible Improvements
* UI design overhaul
* Sorting for all table headings (namely, those that used table joins)
* Extra details for users and animals to make it a more usable and useful application
* Testing the application
* Security improvements
* User account management for administrators and users
* Usability features

## Technologies
This project was created using:
* Laravel Framework 8.37.0
* XAMPP 8.0.2-0
* PHP 8.0.1
* Composer 2.0.8
* NPM 6.14.4
* [Kyslik/column-sortable 6.4](https://github.com/Kyslik/column-sortable)

## Setup
### Running the Project
1. Make sure to install PHP 8, Composer and XAMPP
2. Fork this project to add it to your own github account
3. Clone the project to get a local copy
``` bash
git clone https://github.com/kelvin589/animal-sanctuary
```
5. cd into the project folder
``` bash
cd animal-sanctuary
```
6. Install composer dependencies
``` bash
composer install
```
6. Install NPM dependencies
``` bash
npm install
```
6. Create a copy of the template .env.example file and name it .env
``` bash
cp .env.example .env
```
6. Generate application key
``` bash
php artisan key:generate
```
8. Run MySQL Database in XAMPP
9. Create a database 
10. Update the .env file with details to access the database
``` bash
DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD
```
12. Run migrations
``` bash
php artisan migrate
```
14. Seed the database
``` bash
php artisan db:seed
```
16. Create a symbolic link from public/storage to storage/app/public to store publically accessible files (in this case, animal images). This is not necessary, however; animal images will not work properly without it.
``` bash
php artisan storage:link
```
18. Run the server
``` bash
php artisan serve
```
18. Finished! You should be able to see the website running.

### Developing the Project
If you want to develop this application further, update the application settings in the .env file
* If you want to show error details during local development (This should be false for a production environment as you may expose sensitive configuration information)
```
APP_DEBUG=true
```
* Set the current environment as development
```
APP_ENV=development
```

### Useful Commands
Extra commands which may be useful:
* Make sure you run this after updating the .env
``` bash
php artisan config:clear
```
* To clear the cache
``` bash
php artisan cache:clear
```
* To enable maintenance mode
``` bash
php artisan down
```
* To disable maintenance mode
``` bash
php artisan up
```
* Update dependencies
``` bash
composer update
```
