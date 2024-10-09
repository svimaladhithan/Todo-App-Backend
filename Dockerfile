# Use the official PHP image with Apache
FROM php:8.1-apache

# Set the working directory
WORKDIR /var/www

# Copy the application code to the container
COPY . .

# Install necessary extensions and utilities
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clear Composer cache
RUN composer clear-cache

# Set Composer memory limit
ENV COMPOSER_MEMORY_LIMIT=-1

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --verbose

# Set the Apache document root
ENV APACHE_DOCUMENT_ROOT /var/www/public

# Update Apache configuration to use the new document root
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN sed -ri -e 's!^DocumentRoot.*!DocumentRoot ${APACHE_DOCUMENT_ROOT}!' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!<Directory /var/www/>!<Directory /var/www/public/>!' /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]