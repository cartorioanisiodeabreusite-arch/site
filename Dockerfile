FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY . /var/www/html
COPY docker/apache-security.conf /etc/apache2/conf-available/cartorio-security.conf
COPY docker/render-entrypoint.sh /usr/local/bin/render-entrypoint

RUN a2enconf cartorio-security \
    && chmod +x /usr/local/bin/render-entrypoint \
    && mkdir -p /var/www/html/storage/uploads \
    && chown -R www-data:www-data /var/www/html/storage

EXPOSE 10000
ENTRYPOINT ["/usr/local/bin/render-entrypoint"]
