FROM php:7.0-apache
COPY / /var/www/html/
COPY 000-default.conf /etc/apache2/sites-available
RUN chmod a+w -R /var/www/html/storage
RUN a2enmod rewrite
