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

# Swoole -> https://www.php.net/manual/pt_BR/swoole.installation.php Retirado da propria doc do php
RUN apt-get update && apt-get install vim -y && \
    apt-get install openssl -y && \
    apt-get install libssl-dev -y && \
    apt-get install wget -y && \
    apt-get install git -y && \
    apt-get install procps -y && \
    apt-get install htop -y

RUN cd /tmp && git clone https://github.com/swoole/swoole-src.git && \
    cd swoole-src && \
    git checkout v4.5.2 && \
    phpize  && \
    ./configure  --enable-openssl && \
    make && make install

RUN touch /usr/local/etc/php/conf.d/swoole.ini && \
    echo 'extension=swoole.so' > /usr/local/etc/php/conf.d/swoole.ini

RUN wget -O /usr/local/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.2/dumb-init_1.2.2_amd64
RUN chmod +x /usr/local/bin/dumb-init

RUN apt-get autoremove -y && rm -rf /var/lib/apt/lists/*

ENTRYPOINT ["/usr/local/bin/dumb-init", "--", "php"]

WORKDIR /var/www/html

COPY . .

CMD ["php", "-S", "0.0.0.0:81", "-t", "public"]