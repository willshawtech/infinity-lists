FROM php:7.4-fpm
WORKDIR "/application"

RUN docker-php-ext-install mysqli

# Install and enable xDebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug