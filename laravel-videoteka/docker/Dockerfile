FROM php:8.3-fpm

ARG USER_ID

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    nginx \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    build-essential \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -\
    && apt-get install -y nodejs \
    && npm install -g yarn

RUN adduser -u ${USER_ID} -m algebra_docker
RUN echo "alias ll='ls -al'" >> /home/algebra-docker/.bashrc

USER algebra_docker

EXPOSE 9000

CMD ["php-fpm"]