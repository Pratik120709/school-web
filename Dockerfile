# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Generate Laravel key
RUN php artisan key:generate

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# Expose port 10000 (Render's default)
EXPOSE 10000

# Start Apache (Render requires a persistent process)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]