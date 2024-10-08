#!/bin/bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan optimize:clear
docker compose exec app php artisan optimize
docker compose exec app php artisan package:discover --ansi