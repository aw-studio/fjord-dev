#!/bin/sh
cp .env.example .env
git submodule update --init --recursive
composer install
npm i
php artisan key:generate

cd packages/aw-studio/fjord
git checkout dev
git pull

cd ../../..
ls

sed -i '' 's/DB_PASSWORD=/DB_PASSWORD=root/g' .env
sed -i '' 's/DB_DATABASE=laravel/DB_DATABASE=fjord-dev/g' .env
sed -i '' 's/APP_URL=http://localhost/APP_URL=http://localhost:3000/g' .env

php artisan fjord:install