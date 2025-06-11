# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    opcache \
    sodium

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel files
COPY . .

# Install PHP dependencies (skip platform checks for extensions)
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs

# Generate Laravel key
RUN php artisan key:generate

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 775 /var/www/html/storage

# Expose port 10000 (Render's default)
EXPOSE 10000

# Start Apache (Render requires a persistent process)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]