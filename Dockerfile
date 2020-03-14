# install composer dependencies
FROM composer as composer
COPY ./composer.* /app/
RUN composer install --no-interaction --prefer-source --no-scripts --no-dev

FROM alpine:3.11

# install package dependencies
RUN apk --no-cache add php7 php7-fpm php7-mysqli php7-pdo php7-pdo_mysql php7-json php7-openssl php7-curl php7-zlib php7-xml php7-phar php7-intl php7-dom php7-xmlreader php7-ctype php7-session php7-mbstring php7-gd nginx supervisor curl

# install Nginx, PHP-FPM, and supervisord configuration files
RUN rm /etc/nginx/conf.d/default.conf
COPY ./.docker/nginx.conf /etc/nginx/nginx.conf
COPY ./.docker/fpm-pool.conf /etc/php7/php-fpm.d/www.conf
COPY ./.docker/php.ini /etc/php7/conf.d/custom.ini
COPY ./.docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN mkdir -p /var/www /var/tmp/nginx

RUN chown -R nobody.nobody /var/www && \
  chown -R nobody.nobody /run && \
  chown -R nobody.nobody /var/lib/nginx && \
  chown -R nobody.nobody /var/tmp/nginx && \
  chown -R nobody.nobody /var/log/nginx

VOLUME /var/www

USER nobody

WORKDIR /var/www

COPY --chown=nobody . .

COPY --from=composer /app/vendor /var/www/vendor

EXPOSE 8080

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:8080/fpm-ping