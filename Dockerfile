FROM php:7.4-fpm
WORKDIR /application
RUN apt-get update
RUN apt-get install -y default-mysql-client
RUN apt-get install --no-install-recommends -y wget vim git zip unzip

# PHP extensions
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
COPY . /application
RUN composer install --no-dev --prefer-source --no-interaction
