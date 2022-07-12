FROM php:8.0-cli

RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 8000
