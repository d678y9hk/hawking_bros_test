FROM php:8.3

RUN docker-php-ext-install mysqli pdo pdo_mysql
