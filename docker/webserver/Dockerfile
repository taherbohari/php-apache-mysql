FROM php:7.3-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli
#controls apache URL rewrites
RUN a2enmod rewrite

COPY src/ /var/www/html/
EXPOSE 80
