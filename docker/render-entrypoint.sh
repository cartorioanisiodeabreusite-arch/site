#!/bin/sh
set -eu

APP_PORT="${PORT:-10000}"

sed -ri "s/^Listen [0-9]+$/Listen ${APP_PORT}/" /etc/apache2/ports.conf
sed -ri "s#<VirtualHost \*:[0-9]+>#<VirtualHost *:${APP_PORT}>#" /etc/apache2/sites-available/000-default.conf

mkdir -p /var/www/html/storage/uploads
chown -R www-data:www-data /var/www/html/storage
chmod 700 /var/www/html/storage /var/www/html/storage/uploads

exec apache2-foreground
