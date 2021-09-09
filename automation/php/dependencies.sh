#!/bin/bash

set -xe

# Mise à jour des paquets du serveur
apk update
apk upgrade

# Installation des dépendances
apk add --no-progress --no-cache --upgrade zip unzip git curl

# Installation de composer
curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
