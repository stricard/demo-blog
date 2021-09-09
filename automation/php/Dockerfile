# Image de base
FROM php:7.4-fpm-alpine

# Définition du répertoire de travail
WORKDIR /app

# Installation des dépendences
COPY dependencies.sh dependencies.sh
COPY .env.example .env
RUN chmod +x dependencies.sh
RUN  apk add --no-cache --upgrade bash

RUN bash dependencies.sh

# Lancement du serveur de démo
CMD composer install && composer artisan key:generate && php artisan test --coverage-html ./public/coverage && php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000

