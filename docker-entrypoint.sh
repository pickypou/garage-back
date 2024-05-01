#!/bin/bash

<<<<<<< HEAD
# Attendre que MySQL soit prêt
until mysqladmin ping -h"db" -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" --silent; do
    echo "MySQL n'est pas encore prêt - en attente ..."
    sleep 1
done

# Créer la base de données
php bin/console doctrine:database:create --if-not-exists

# Appliquer les migrations
php bin/console doctrine:migrations:migrate --no-interaction

# Démarrer le serveur Symfony local
symfony local:server:start --port=8000 --dir=/app
=======
#Démarrer le serveur symfony local
echo "Starting Symfony server..."
symfony server:start
>>>>>>> cb6d560c95747a078ad8d3660ca9a66c2b7b09bf
