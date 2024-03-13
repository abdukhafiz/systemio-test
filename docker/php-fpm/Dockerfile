FROM php:8.2-fpm

# Copy composer.lock and composer.json
#COPY composer.lock composer.json /var/www/

WORKDIR /var/www

#MAINTAINER Abduhafiz Kayumov <abdukhafiz@gmail.com>

RUN apt-get update && apt-get install -y \
    git \
    unzip\
    libzip-dev\
    libmcrypt-dev\
    libc-client-dev\
    libkrb5-dev\
    libpcre3-dev\
    libpq-dev\
    libxml2-dev\
    libxslt1.1\
    libxslt1-dev\
    libmagickwand-dev\
    libmagickcore-dev\
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && rm -r /var/lib/apt/lists/*

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Mysql PDO
RUN docker-php-ext-install mysqli && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install pdo && \
    docker-php-ext-install pdo_pgsql

# Required if need manipulate images
RUN docker-php-ext-configure exif \
    && docker-php-ext-install exif

RUN docker-php-ext-install bcmath \
        calendar\
        fileinfo\
        gettext\
        pcntl\
        sockets\
        xmlwriter\
        xsl\
        opcache\
        zip\
        gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
