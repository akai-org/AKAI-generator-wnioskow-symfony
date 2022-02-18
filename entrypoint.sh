#!/bin/bash

composer install
php -S 0.0.0.0:8080 -t /app/public