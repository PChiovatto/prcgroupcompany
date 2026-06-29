# PRC Group — PHP + Apache image for Coolify / any Docker host
FROM php:8.3-apache

# Enable Apache modules used by .htaccess (rewrite + security headers)
RUN a2enmod rewrite headers

# Allow .htaccess overrides in the web root
RUN sed -ri 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf

# Copy the site into Apache's document root
COPY . /var/www/html/

# Remove dev-only files from the image
RUN rm -f /var/www/html/run_local.bat \
    && chown -R www-data:www-data /var/www/html

EXPOSE 80
