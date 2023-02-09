FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y

# Install build dependencies and the OPcache extension
RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install opcache \
    && apk del $PHPIZE_DEPS

# Copy the opcache.ini into your Docker image    
COPY opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Run your application
CMD php-fpm