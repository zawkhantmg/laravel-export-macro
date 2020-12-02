#!/bin/bash
# Laravel-Export-Macro Automatic Setup by ZKM
# Project Repo : https://github.com/zawkhantmg/laravel-export-macro


cat << "EOF"
 _____  __   __   ___   ___
|__  /  | | / /  |   \_/   |
  / /   | |/ /   | |\   /| |
 / /_   | |\ \   | | \_/ | |
/____|  |_| \_\  |_|     |_|

 >> Project Repo : https://github.com/zawkhantmg/laravel-export-macro
 >> Scripted by : Zaw Khant Maung
EOF

function clone(){

        #creating database
        echo "Creating laravel_export_macro database"
        mysql -u $uname -p$pass -e "CREATE DATABASE IF NOT EXISTS laravel_export_macro"
        echo "Laravel-Export-Macro Setup Finished Successfully. Happy learning !"

}

# Define Color
Cyan='\033[0;36m'
NC='\033[0m' # No Color
BOLD=$(tput bold)
NORM=$(tput sgr0)

# configuring mysql for Laravel-Export-Macro
echo -n "Enter mysql username : "
read uname
echo -n "Enter mysql password : "
read -s pass
echo

# copy .env file
composer install
cp .env.example .env

# Insert values
sed -i -e "s/\(DB_USERNAME=\).*/\1$uname/" \
-e "s/\(DB_PASSWORD=\).*/\1$pass/" .env

# php key generate
php artisan key:generate

# function call
clone

# database migrate and seeding
php artisan migrate --seed
start http://localhost:8000/
php artisan serve