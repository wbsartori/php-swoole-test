# Use the official PHP 7.4 image from Docker Hub
FROM php:7.4.21-cli

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    nano \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    unzip

WORKDIR /var/www/html

COPY . .

CMD ["php", "-S", "0.0.0.0:81", "-t", "public"]