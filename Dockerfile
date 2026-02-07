FROM php:8.4-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    unzip git curl \
    && docker-php-ext-install pdo pdo_sqlite

COPY . .

RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD ["sh", "-c", "exec php -S 0.0.0.0:$PORT -t public"]
