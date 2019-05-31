FROM php:7.2.17-fpm

RUN apt-get update && apt-get install -y nodejs libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && docker-php-ext-install mbstring xml zip pdo pdo_mysql mysqli
