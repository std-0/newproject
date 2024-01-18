FROM php:8.1-fpm-alpine
RUN apk update && apk add \
    icu-dev \
    nodejs \
    npm \
    freetype-dev \
	libjpeg-turbo-dev \
	libpng-dev \
    libzip-dev \
    openssh
RUN docker-php-ext-install \
    pdo_mysql \
    intl \
    zip
ENV COMPOSER_ALLOW_SUPERUSER=1  
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY ./ /var/www/public_html