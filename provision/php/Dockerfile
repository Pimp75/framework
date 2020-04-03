FROM composer as multistage-composer

FROM php:7.2-fpm-alpine

# Dépendences nécessaires pour les extensions PHP, plus Wget/Git/SSH
RUN apt-get update && apt-get install --no-install-recommends -yq ${BUILD_PACKAGES} \
        build-essential \
        wget \
        ssh \
        git \
        libmcrypt-dev \
        libicu-dev \
        libzip-dev \
    && apt-get clean

# Quelques extensions PHP recommmandées
ENV PHP_EXTENSIONS opcache pcntl intl zip
RUN docker-php-ext-install ${PHP_EXTENSIONS}

RUN pecl install xdebug && docker-php-ext-enable xdebug

# Installation de composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN mkdir /var/composer
ENV COMPOSER_HOME /var/composer

# Activation d'Apache mod_rewrite
RUN a2enmod rewrite

# On configure un vhost, pour ne pas avoir de public/ ou web/ dans l'URL
COPY vhost.conf /etc/apache2/sites-enabled/000-default.conf
