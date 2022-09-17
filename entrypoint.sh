#!/bin/bash

if [ ! -f /app/.env ]
then
  cp /app/.env.example /app/.env
fi
composer config --no-plugins allow-plugins.symfony/flex true
composer install
php -S 0.0.0.0:8080 -t /app/public