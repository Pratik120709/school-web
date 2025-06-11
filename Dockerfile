FROM php:8.2-apache

# 1. Install system dependencies including MySQL client and development files
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype-dev \
    libzip-dev libonig-dev libxml2-dev unzip \
    default-mysql-client libpq-dev && \  # Added MySQL client and libpq-dev
    apt-get clean

# 2. Configure PHP extensions with proper MySQL support
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_mysql mbstring gd zip opcache

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Configure Apache
RUN a2enmod rewrite
RUN echo "DocumentRoot /var/www/html/public" > /etc/apache2/sites-available/000-default.conf && \
    echo "<Directory /var/www/html/public>" >> /etc/apache2/sites-available/000-default.conf && \
    echo "    AllowOverride All" >> /etc/apache2/sites-available/000-default.conf && \
    echo "    Require all granted" >> /etc/apache2/sites-available/000-default.conf && \
    echo "</Directory>" >> /etc/apache2/sites-available/000-default.conf

# 5. Set working directory
WORKDIR /var/www/html
COPY . .

# 6. Install dependencies (skip key generation during build)
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs

# 7. Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# 8. Runtime setup (will run when container starts)
CMD bash -c "\
    cp .env.example .env && \
    php artisan key:generate && \
    php artisan config:cache && \
    php artisan view:cache && \
    php artisan migrate --force && \  # Added database migration
    apache2-foreground"

EXPOSE 80