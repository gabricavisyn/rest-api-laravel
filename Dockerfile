FROM alpine:3

WORKDIR /var/www

RUN apk add --no-cache \
    curl \
    nginx \
    php8 \
    php8-bcmath \
    php8-common\
    php8-ctype \
    php8-curl \
    php8-dom \
    php8-fileinfo \
    php8-fpm \
    php8-gd \
    php8-iconv  \
    php8-imap \
    php8-intl \
    php8-ldap \
    php8-mbstring \
    php8-mysqli \
    php8-opcache \
    php8-openssl \
    php8-pdo \
    php8-pdo_mysql \
    php8-pdo_pgsql\
    php8-phar \
    php8-pgsql \
    php8-redis \
    php8-session \
    php8-simplexml \
    php8-sqlite3 \
    php8-sodium \
    php8-xml \
    php8-xmlreader \
    php8-xmlwriter \
    php8-tokenizer \
    php8-zip \
    php8-zlib \
    supervisor

#Symlink php
RUN ln -s /usr/bin/php8 /usr/bin/php

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configure nginx
COPY _devops/local/docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY _devops/local/docker/php/fpm-pool.conf /etc/php8/php-fpm.d/www.conf
COPY _devops/local/docker/php/php.ini /etc/php8/conf.d/custom.ini

# Configure supervisord
COPY _devops/local/docker/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose the port nginx is reachable on
EXPOSE 80

# Let supervisord start nginx & php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
