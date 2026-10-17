FROM php:8.2-apache

# Instalar extensiones necesarias de PHP para MySQL y reescritura de URLs en Apache
RUN docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite

# Configurar Apache para permitir CORS y reescritura de endpoints
RUN echo '<Directory /var/www/html>' >> /etc/apache2/apache2.conf \
    && echo '    AllowOverride All' >> /etc/apache2/apache2.conf \
    && echo '    Require all granted' >> /etc/apache2/apache2.conf \
    && echo '</Directory>' >> /etc/apache2/apache2.conf

WORKDIR /var/www/html

COPY . /var/www/html/

EXPOSE 80
