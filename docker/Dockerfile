FROM php:7.2-fpm-alpine

RUN apk update && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS imagemagick-dev libtool \
    libmcrypt-dev libpng-dev git zip unzip shadow \
    && pecl install imagick mcrypt-1.0.1 xdebug \
    && docker-php-ext-enable imagick mcrypt xdebug \
    && docker-php-ext-install pdo pdo_mysql mbstring gd \
    && apk del libtool \
    && rm -rf /tmp/* /var/cache/apk/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV PATH="$PATH:/home/composer_bot/.composer/vendor/bin"

RUN adduser -S -D composer_bot \
    && apk add nodejs nodejs-npm \
    && chown -R composer_bot /usr/bin/composer \
    && usermod -u 1000 www-data