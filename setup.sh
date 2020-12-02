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
 >> Scripted by : Zaw Khant Mg


EOF

function module() {
        echo
        pip install xlsxwriter
        pip install openpyxl
}
function installPy() {
        echo
        echo "Please download and install python."
        read -r -p "Do you want to go to py download page [y/n] : " gotourl
        case "$gotourl" in
        [yY][eE][sS]|[yY])
                start https://www.python.org/downloads/
                ;;
        esac
        read -r -p "If you have install, confirm that you have install python [y/n] : " confirm
        case "$confirm" in
        [yY][eE][sS]|[yY])
                module
                ;;
        *)
                installPy
                ;;
        esac
}

read -r -p "Install python in your machine [y/n] : " response
case "$response" in
    [yY][eE][sS]|[yY])
        module
        ;;
    *)
        installPy
        ;;
esac

function clone(){

        #creating database
        echo "Creating laravel_export_macro database"
        mysql -u $uname -p$pass -e "CREATE DATABASE IF NOT EXISTS laravel_export_macro"
        echo "Laravel-Export-Macro Setup Finished Successfully. Happy learning !"

}

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