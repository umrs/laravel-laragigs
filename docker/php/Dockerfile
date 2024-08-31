# https://hub.docker.com/_/php/
FROM php:8.3-fpm-bookworm

RUN apt-get update \
  # Install Postgre PDO
  && apt-get install -y libpq-dev \
  && docker-php-ext-install pgsql pdo_pgsql \
  && rm -rf /var/lib/apt/lists/*

RUN apt-get update \
  && apt-get install --no-install-recommends --no-install-suggests -y unzip \
  && rm -rf /var/lib/apt/lists/*

## Install symfony cli
#RUN apt-get update \
#  && apt-get install --no-install-recommends --no-install-suggests -y apt-transport-https ca-certificates gnupg git unzip \
#  && curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash \
#  && apt-get install symfony-cli \
#  && rm -rf /var/lib/apt/lists/*

# Install composer latest release
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

WORKDIR /var/www/app