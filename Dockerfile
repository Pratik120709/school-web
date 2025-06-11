FROM php:8.2-apache

# 1. Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype-dev \
    libzip-dev libonig-dev libxml2-dev unzip && \
    apt-get clean

# 2. Configure PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo_mysql mbstring gd zip opcache

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Configure Apache (no external file needed)
RUN a2enmod rewrite && \
    echo "DocumentRoot /var/www/html/public" > /etc/apache2/sites-available/000-default.conf && \
    echo "<Directory /var/www/html/public>" >> /etc/apache2/sites-available/000-default.conf && \
    echo "    AllowOverride All" >> /etc/apache2/sites-available/000-default.conf && \
    echo "    Require all granted" >> /etc/apache2/sites-available/000-default.conf && \
    echo "</Directory>" >> /etc/apache2/sites-available/000-default.conf

# 5. Set working directory and copy files
WORKDIR /var/www/html
COPY . .

# 6. Install dependencies
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs

# 7. Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# 8. Generate application key
RUN php artisan key:generate

EXPOSE 80
CMD ["apache2-foreground"]