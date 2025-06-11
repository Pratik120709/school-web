FROM php:8.2-apache

# 1. Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libzip-dev zlib1g-dev libonig-dev libxml2-dev \
    git unzip && \
    apt-get clean

# 2. Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo_mysql mbstring gd zip opcache

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Configure Apache
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 5. Copy app files
WORKDIR /var/www/html
COPY . .

# 6. Install dependencies
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs

# 7. Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# 8. Runtime commands (will run when container starts)
CMD bash -c "cp .env.example .env && php artisan key:generate && php artisan config:cache && apache2-foreground"

EXPOSE 80