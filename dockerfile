FROM php:8.2-fpm

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    wget

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Symfony CLI
RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install project dependencies
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-interaction --optimize-autoloader

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# Install Encore and build assets
RUN npm install

# Expose port 9000 for PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]