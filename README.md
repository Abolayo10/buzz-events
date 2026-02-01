# 🔥 Buzz Events

Application Laravel pour enregistrer et partager les événements qui font le buzz sur internet.

## 📋 Fonctionnalités

- ✅ Ajouter des événements buzz avec image, titre, description et lien source
- ✅ Visualiser tous les événements
- ✅ Modifier et supprimer des événements
- ✅ Compteur de vues
- ✅ Page À propos
- ✅ Interface responsive avec Tailwind CSS

## 🚀 Installation avec Docker

### Prérequis
- Docker Desktop installé
- Git installé

### Étapes d'installation

1. **Cloner le dépôt**
```bash
git clone https://github.com/USERNAME/buzz-events.git
cd buzz-events
```

2. **Copier le fichier d'environnement**
```bash
cp .env.example .env
```

3. **Lancer les conteneurs Docker**
```bash
docker-compose up -d
```

4. **Installer les dépendances**
```bash
docker-compose exec app composer install
```

5. **Générer la clé d'application**
```bash
docker-compose exec app php artisan key:generate
```

6. **Exécuter les migrations**
```bash
docker-compose exec app php artisan migrate
```

7. **Créer le lien symbolique pour le stockage**
```bash
docker-compose exec app php artisan storage:link
```

8. **Accéder à l'application**
- Application : http://localhost:8080
- phpMyAdmin : http://localhost:8081

## 🛠️ Technologies utilisées

- **Backend** : Laravel 10
- **Frontend** : Blade, Tailwind CSS, Font Awesome
- **Base de données** : MySQL 8.0
- **Conteneurisation** : Docker & Docker Compose
- **Serveur web** : Nginx

## 📦 Services Docker

- `app` : PHP-FPM 8.2
- `nginx` : Serveur web Nginx
- `db` : MySQL 8.0
- `phpmyadmin` : Interface de gestion de base de données

## 🔧 Commandes utiles
```bash
# Arrêter les conteneurs
docker-compose down

# Voir les logs
docker-compose logs -f

# Accéder au conteneur app
docker-compose exec app bash

# Effacer le cache
docker-compose exec app php artisan cache:clear

# Réinitialiser la base de données
docker-compose exec app php artisan migrate:fresh
```

## 👤 Auteur

Votre Nom - Développeur Full Stack

## 📄 Licence

Ce projet est sous licence MIT.