FROM php:7.4.21-apache
# Install all the system dependencies and enable PHP modules 
RUN apt-get update -y && \
    apt-get install -y libicu-dev libpng-dev libzip-dev zip unzip && \
    docker-php-ext-install intl pdo_mysql gd zip && \
    sed -i -e "s/html/html\/booking\/public/g" /etc/apache2/sites-enabled/000-default.conf && \
    a2enmod rewrite
# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer