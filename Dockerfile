FROM php:7.4

COPY . /app
WORKDIR /app
RUN apt update && apt-get install -y git libzip-dev zip \
  && docker-php-ext-install zip pdo pdo_mysql
RUN curl https://getcomposer.org/download/latest-stable/composer.phar -o composer.phar && \
    chmod +x composer.phar && \
    mv composer.phar /usr/local/bin/composer

RUN composer install
ENTRYPOINT /app/entrypoint.sh