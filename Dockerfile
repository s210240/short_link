FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Добавьте этот шаг перед запуском composer install
#RUN echo "error_reporting = E_ALL & ~E_DEPRECATED" > /usr/local/etc/php/conf.d/disable-deprecated.ini

RUN composer install --no-dev --no-autoloader
#RUN composer install --no-dev --optimize-autoloader

#COPY / /var/www/html/
COPY 000-default.conf /etc/apache2/sites-available
RUN chmod a+w -R /var/www/html/storage
RUN a2enmod rewrite
