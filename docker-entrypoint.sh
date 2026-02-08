#!/bin/bash
set -e

# Configuration du port Apache depuis la variable d'environnement Railway
if [ -n "$PORT" ]; then
    echo "Listen $PORT" > /etc/apache2/ports.conf
    sed -i "s/<VirtualHost \*:.*>/<VirtualHost *:$PORT>/" /etc/apache2/sites-available/000-default.conf
fi

# Cache Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Démarrage d'Apache
exec apache2-foreground