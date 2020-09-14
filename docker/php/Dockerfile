FROM php:7.3-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
    && apt-get install -y libzip-dev mariadb-client libmagickwand-dev -y --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libpng-dev locales locales-all vim cron \
    && docker-php-ext-install zip pdo_mysql exif \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get -y update
RUN apt-get install -y \
    curl \
    gnupg
RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g
RUN locale-gen en_US.UTF-8

#Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

ENV LANG=ja_JP.UTF-8

WORKDIR /var/www

RUN composer global require "laravel/installer"