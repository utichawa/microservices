#!/bin/bash

RED='\033[0;31m'
NC='\033[0m'

if [ ! -f docker-compose.yml ]; then
    printf "${RED}Please make sure to run this script from the root directory of this repo ツ${NC}\n"
    exit 1
fi

docker="docker compose exec app "

printf "✨ Powering up the infrastructure\n"
docker compose up -d
printf "✨ Setting up the project\n"

eval "$docker" composer install --optimize-autoloader --no-dev
eval "$docker" cp .env.production .env
eval "$docker" php artisan key:generate
eval "$docker" php artisan cms:install
eval "$docker" php artisan storage:link
eval "$docker" php artisan db:load-translations
eval "$docker" php artisan config:cache
eval "$docker" php artisan route:cache
eval "$docker" php artisan view:cache

printf "✔️ Done\n"
