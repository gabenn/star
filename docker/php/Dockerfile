FROM php:8.3-fpm
ENV NODE_VERSION=18.16.0

RUN apt-get update
RUN apt-get install -y git libzip-dev zip libicu-dev libpng-dev libcurl4-gnutls-dev libwebp-dev libjpeg-dev
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure gd --with-webp --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql mysqli exif zip intl curl gd

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
ENV NVM_DIR=/usr/bin/.nvm
RUN cp -R /root/.nvm ${NVM_DIR}
RUN . "${NVM_DIR}/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "${NVM_DIR}/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "${NVM_DIR}/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/usr/bin/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN npm install -g yarn

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
USER www
