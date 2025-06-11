FROM php:8.2-apache

# System dependencies
RUN apt-get update && apt-get install -y \
    build-essential libpng-dev libjpeg62-turbo-dev \
    libfreetype6-dev libwebp-dev libzip-dev zlib1g-dev \
    libicu-dev libonig-dev libxml2-dev libsodium-dev \
    git curl unzip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-configure intl && \
    docker-php-ext-install -j$(nproc) \
    gd pdo_mysql mbstring exif pcntl bcmath zip intl opcache sodium && \
    docker-php-source delete

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Apache configuration
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Application setup
WORKDIR /var/www/html
COPY . .

# PHP config
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    echo "memory_limit = 512M" >> "$PHP_INI_DIR/conf.d/memory-limit.ini"

# Install dependencies
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs

# Laravel setup
RUN php artisan key:generate && \
    php artisan optimize:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]