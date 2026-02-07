# 1️⃣ Image PHP officielle
FROM php:8.4-cli

# 2️⃣ Dossier de travail
WORKDIR /var/www

# 3️⃣ Installer dépendances système
RUN apt-get update && apt-get install -y \
    unzip git curl libsqlite3-dev libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# 4️⃣ Installer Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# 5️⃣ Copier les fichiers de l'application
COPY . .

# 6️⃣ Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# 7️⃣ Permissions pour Laravel
RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# 8️⃣ Exposer le port utilisé par Railway
EXPOSE 8080

# 9️⃣ Démarrer le serveur PHP au premier plan
CMD ["sh", "-c", "exec php -S 0.0.0.0:$PORT -t public"]
