# mdlEditor Repository

This repository contains the newest editor for MiDigitalLife. The purpose of the editor is to:
* Create and maintain knowledge content that is consumed by the various miDigitalLife services.
* Create and maintain client products (usually in the form of web forms) used for the purpose of collecting data.
* Upload client files in the form of PDFs, images and other media files

## Getting Started with Editor

### Prerequisites:
* **Windows**, **Mac OS**, or **Linux**
* **PHP 7+**
* **mySQL 5.7**
* **Laravel 5.4**

### Setting up:
* Fork this repository to your local file system.
* Unzip the `/core/vendor.zip` contents into the `/core/vendor/` folder.
* Extract the database from `http://editor2.appenberg.co.za/phpmyadmin/`
* Rename the `/core/ENV` file to `/core/.env`  and modify it to reflect your local setup.

## Project structure

The `./core` folder contains all the Laravel code used by the application. This directory contains some folders and files that may **NOT** be changed. Please ensure you follow the guidelines below very carefully: 

Folders and files that may be changed:
* assets
* core/app/http/controllers
* core/app/Models
* core/app/Editor/Repositories/Eloquent
* core/resources/views
* core/routes
* core/database

The other folders and files should **NOT** be changed unless you are certain of what you are doing. These include:
* core/config
* core/vendor
* core/bootstrap
* .env
* composer.json
* artisan
* package.json
* server.php
* webpack.mix.js
* lara.md
* phpunit.xml

Please don't hesitate to email or whatsapp if you are experiencing problems.


The MiDigitalLife Team
