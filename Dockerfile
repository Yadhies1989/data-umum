FROM php:7.4.28-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN a2enmod rewrite

COPY data_umum /var/www

RUN service apache2 restart