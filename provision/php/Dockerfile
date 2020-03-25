FROM composer as multistage-composer

FROM php:7.2-fpm-alpine

COPY --from=multistage-composer /usr/bin/composer /usr/local/bin/composer

RUN apk add --no-cache ca-certificates icu-libs git unzip && \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS icu-dev && \
    # Extension PHP
    # php.ini
    echo "short_open_tag = off" >> /usr/local/etc/php/php.ini && \
    # Clear
    apk del .build-deps && \
    # User
    addgroup -g 1000 php && \
    adduser -u 1000 -G php -s /bin/sh -D php
