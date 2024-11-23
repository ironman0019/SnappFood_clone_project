FROM php:8.2-cli as php

# Install necessary dependencies, including Composer and MySQL driver
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    libmariadb-dev-compat libmariadb-dev \
    && docker-php-ext-install pdo pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir -p /var/www

COPY . /var/www/

WORKDIR /var/www

ENTRYPOINT [ "docker/entrypoint.sh" ]


# EXPOSE 8000


# ========================================================================================
# node
FROM node:18-alpine as node

WORKDIR /var/www
COPY . /var/www/

RUN npm install

RUN npm run build

VOLUME /var/www/node_modules