# Use the official PHP image with Apache
FROM php:8.2-apache

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip curl libzip-dev libpq-dev git \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer (get the latest version)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set correct permissions for Apache to access storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Enable Apache mod_rewrite for Laravel
RUN a2enmod rewrite

# Set environment variables (optional but recommended)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Modify Apache config to point to Laravel's public folder
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

# Clear config cache and optimize Laravel
RUN php artisan config:clear && \
    php artisan config:cache && \
    php artisan route:clear && \
    php artisan route:cache

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
