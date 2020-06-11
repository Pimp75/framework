FROM php:7.2-fpm-alpine

RUN apk add --no-cache ca-certificates icu-libs git unzip && \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS icu-dev && \
    # Extension PHP
    docker-php-ext-install intl pdo_mysql && \
    # php.ini
    echo "short_open_tag = off" >> /usr/local/etc/php/php.ini && \
    # Clear
    apk del .build-deps && \
    # User
    addgroup -g 1000 php && \
    adduser -u 1000 -G php -s /bin/sh -D php

#Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer