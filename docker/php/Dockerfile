FROM php:7.4.2-cli

# Instalação de dependências
RUN apt-get update && apt-get install -y \
    vim \
    openssl \
    libssl-dev \
    wget \
    git \
    procps \
    htop \
    nano \
    supervisor

# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalação do Swoole
RUN cd /tmp && git clone https://github.com/swoole/swoole-src.git && \
    cd swoole-src && \
    git checkout v4.5.2 && \
    phpize && \
    ./configure --enable-openssl && \
    make && make install

RUN touch /usr/local/etc/php/conf.d/swoole.ini && \
    echo 'extension=swoole.so' > /usr/local/etc/php/conf.d/swoole.ini

# Instalação do dumb-init
RUN wget -O /usr/local/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.2/dumb-init_1.2.2_amd64 && \
    chmod +x /usr/local/bin/dumb-init

# Limpeza
RUN apt-get autoremove -y && rm -rf /var/lib/apt/lists/*

# Copia o script do servidor Swoole
COPY swoole-server.php /usr/local/bin/swoole-server.php
# Comando de entrada
#ENTRYPOINT ["/usr/local/bin/dumb-init", "--", "php", "/var/www/swoole-server.php"]

COPY docker/config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["/usr/bin/supervisord", "-n"]