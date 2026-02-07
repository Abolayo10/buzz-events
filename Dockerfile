# Utiliser PHP CLI 8.4
FROM php:8.4-cli

WORKDIR /var/www

# Installer dépendances système pour Laravel + SQLite + Composer
RUN apt-get update && apt-get install -y \
    unzip git curl libsqlite3-dev libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copier le projet Laravel
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Créer le fichier SQLite si nécessaire
RUN mkdir -p database \
    && touch database/database.sqlite \
    && chmod 775 database/database.sqlite \
    && chmod -R 775 database \
    && chmod -R 775 storage bootstrap/cache

# Lancer les migrations
RUN php artisan migrate || true

# Exposer le port pour Railway
EXPOSE 8080

# Lancer Laravel sur le port dynamique
CMD ["sh", "-c", "exec php -S 0.0.0.0:$PORT -t public"]
