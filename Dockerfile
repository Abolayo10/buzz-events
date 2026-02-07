FROM php:8.4-cli

WORKDIR /var/www

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    unzip git curl libsqlite3-dev libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Permissions pour Laravel
RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# Lancer PHP au premier plan (Railway)
CMD ["sh", "-c", "exec php -S 0.0.0.0:$PORT -t public"]
