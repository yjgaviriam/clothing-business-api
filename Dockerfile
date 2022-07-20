FROM php:8.1.0-fpm-alpine

# Install dependencies
RUN apk update
RUN apk add postgresql-dev
RUN docker-php-ext-install pdo pdo_pgsql

# Move to actual working directory
WORKDIR /var/www/html/

# Install composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
COPY . .
RUN composer i
