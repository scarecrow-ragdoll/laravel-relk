FROM php:8.1-fpm as BASE

ARG user
ARG uid

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mbstring exif pcntl bcmath gd pdo pdo_mysql mysqli sockets && docker-php-ext-enable pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/laravel-elk

