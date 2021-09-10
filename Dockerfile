# Image de base
FROM php:7.4-fpm-alpine

# Définition du répertoire de travail
WORKDIR /app

# Lancement du serveur de démo
CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000

