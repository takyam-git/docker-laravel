FROM php:7-fpm-alpine

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql opcache

COPY ./php.ini /usr/local/etc/php/

