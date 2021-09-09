# Image de base
FROM php:7.4-fpm-alpine

# Définition du répertoire de travail
WORKDIR /app

# Installation des dépendences
COPY dependencies.sh dependencies.sh

RUN chmod +x dependencies.sh
RUN  apk add --no-cache --upgrade bash

RUN bash dependencies.sh

# Lancement du serveur de démo
CMD cp .env.example .env && cp db.sqlite.example db.sqlite && composer install && php artisan key:generate && php artisan test --coverage-html ./public/coverage && php artisan migrate:fresh --seed && php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000

