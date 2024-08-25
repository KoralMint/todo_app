FROM php:8.3-apache

COPY ./app/php/php.ini /usr/local/etc/php/
COPY ./app/apache/000-default.conf /etc/apache2/sites-enabled/
COPY ./app/apache/apache2.conf /etc/apache2/

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN apt-get update

# zip unzip install
RUN apt-get -y update && apt-get --no-install-recommends install -y \
    libzip-dev \
    zip \
    unzip \
    vim \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libpq-dev \
    libmcrypt-dev \
    libicu-dev \
    libonig-dev \
    curl \
    gnupg \
    && rm -rf /var/lib/apt/lists/*

# PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
&& docker-php-ext-install -j$(nproc) gd intl mbstring exif pdo_pgsql pdo_mysql opcache zip mysqli

# composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
&& php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
&& php composer-setup.php \
&& mv composer.phar /usr/local/bin/composer

# npm install
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get -y install nodejs
RUN npm install npm@10.2.4 -g

WORKDIR /var/www/html/

RUN a2enmod rewrite
