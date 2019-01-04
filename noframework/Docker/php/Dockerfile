FROM php:7.2.0-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libmemcached-dev \
    curl

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY ./xdebug.ini /usr/local/etc/php/conf.d/

RUN usermod -u 1000 www-data

CMD ["php-fpm"]