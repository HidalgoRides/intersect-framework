# install composer dependencies
FROM composer as composer
COPY ./composer.* /app/
RUN composer install --no-interaction --prefer-source --no-scripts

# install PHP / Apache
FROM php:7.1-apache

WORKDIR /var/www

# Install server packages
RUN apt-get update && \
    apt-get install -y git zip unzip && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    pecl install xdebug && \
    echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    apt-get -y autoremove && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    a2enmod rewrite && a2enmod ssl

# copy Apache configuration
COPY ./.docker/apache.conf /etc/apache2/sites-available/000-default.conf

# copy all files to root directory
COPY . .

# copy vendor dependencies to root directory
COPY --from=composer /app/vendor /var/www/vendor