#!/bin/bash
rm database/database.sqlite
touch database/database.sqlite
chown www-data database
chown www-data database/database.sqlite
php artisan migrate
php artisan db:seed