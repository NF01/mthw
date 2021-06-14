#!/bin/bash
composer install 
npm install
npm run prod
php artisan storage:link
php artisan key:generate
