FROM php:7.4.28-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY docker-config/apache/httpd.conf /etc/httpd/conf/httpd.conf

RUN a2enmod rewrite

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY ./ /var/www/html/data_umum

RUN service apache2 restart

EXPOSE 8080