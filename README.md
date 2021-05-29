# Animal Sanctuary
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
* UI design
* Sorting for all table headings (namely, those that used table joins)

## Technologies
This project was created using:
* Laravel Framework 8.37.0
* XAMPP 8.0.2-0
* PHP 8.0.1
* [Kyslik/column-sortable 6.4](https://github.com/Kyslik/column-sortable)

## Setup
To run this project:
1. Fork this project to add it to your own github account
2. Download the project or clone the project to get a local copy
3. Install dependencies composer install
4. Run XAMPP MySQL Database
5. Run migrations 
6. start server php artisan serve
7. If you want to develop, put it in development mode
8. 
