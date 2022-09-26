
FROM php:8.1-fpm
COPY . /app
WORKDIR /app
COPY --from=composer:2.4 /usr/bin/composer /usr/local/bin/composer
RUN apt-get update && apt-get -y install --no-install-recommends texlive texlive-latex-extra \
    texlive-extra-utils texlive-bibtex-extra latexmk
RUN apt update && apt-get install -y git libzip-dev zip \
  && docker-php-ext-install zip pdo pdo_mysql