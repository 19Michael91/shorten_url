
I. Install Composer:

  1) Open terminal and execute th command:

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"




II. Install Laravel

  1) Select the directory on the hosting in which you want to install Laravel;

  2) pen terminal and execute th command:

    composer create-project --prefer-dist laravel/laravel blog "5.2.*"



III.To connect to the database you need to do the following:

  1) Open the .env file and enter data in the following fields:

    DB_CONNECTION=mysql
    DB_HOST= *****
    DB_PORT= *****
    DB_DATABASE= *****
    DB_USERNAME= *****
    DB_PASSWORD= *****

  2) To create tables in your database, open a terminal in the root directory and execute the command:

    php artisan migrate