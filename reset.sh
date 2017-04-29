#!/bin/bash
rm database/database.sqlite
touch database/database.sqlite
php artisan migrate
php artisan db:seed