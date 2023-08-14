# E-Commerce CMS - PHP Laravel Project

Welcome to the E-Commerce CMS project, a content management system(CMS) built using the Laravel framework for managing an E-Commerce store's brands, categories, and products.

This system is hosted on AWS on: 
```
 http://13.59.213.85/ 
```
The sample email address and password to log in are:
Email: ```larkin.beulah@example.com```
Password: ```password``` 

Feel free to try it on your own!

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)

## Introduction

This repository contains a PHP Laravel project that serves as a content management system (CMS) for an E-Commerce store. It empowers authenticated users to perform CRUD (Create, Read, Update, Delete) operations on brands, categories, and products, enabling efficient management of the store's content.

## Features

- User Authentication: Secure user authentication system is in place to ensure only authorized users can access and manage the content.
- Brands Management: Add, edit, view, and delete different brands for products.
- Categories Management: Manage product categories with ease, including creation, editing, and deletion.
- Products Management: Full CRUD functionality for products, allowing easy addition, updating, and removal.
- Responsive Design: The user interface is designed to be responsive, ensuring a consistent experience across devices.
- User-Friendly Interface: Intuitive and user-friendly interface for seamless navigation and content management.

## Installation

1. Clone the repository from GitHub:
   ```
   git clone https://github.com/YujiaWang6/E-Commerce_CMS.git
   ```
2. Change directory to the project folder:
   ```
   cd E-Commerce_CMS
   ```
3. Update composer:
   ```
   composer update
   ```
4. We need to setup the database connection 
    
    Before we use MAMP and phpMyAdmin to create a new database, look at the ```.env``` file first:
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=Assignment3
    DB_USERNAME=root
    DB_PASSWORD=root
    DB_SOCKET=/var/run/mysqld/mysqld.sock
   ```
    The above are the current setting, make sure to change the DB_SOCKET to the path below:
   ```
    DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
   ```

   By using the MAMP, make sure to change the MAMP preferences to set the document root to the ```public``` folder in your ```E-Commerce_CMS``` folder. After changing the root, restart the MAMP. Now you can go to the home page on
   ```
    http://localhost:8888/
   ```

   Now, we are going to set up the database. Go to the website below to create a database matching the database name in the .env file (if you haven't change the value of DB_DATABASE, to create a new database named ```Assignment3``` )
   ```
   http://localhost:8888/phpMyAdmin
   ```

5. update your ```.env``` file to use the ```public``` file system:
   ```
   FILESYSTEM_DISK=public
   ```

6. Run the following command to create the required tables and seed them with testing data:
   ```
    php artisan migrate:refresh --seed
   ```

7. Now you can go to your database to check the generated username and password to start using this CMS. 
    Go to:
   ```
    http://localhost:8888/phpMyAdmin
   ```

   navigate into ```user``` table inside the database you just created. Copy the ```email``` from one line which is the login email. The ```password``` is encrypted. you can just type ```password``` for ```password```. Then, you are logged in! 

