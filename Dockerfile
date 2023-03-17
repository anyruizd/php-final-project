FROM php:7.4-apache 
RUN a2enmod rewrite && \
    docker-php-ext-install mysqli
RUN systemctl restart apache2