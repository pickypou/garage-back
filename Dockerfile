# Utilisation d'une image officielle PHP avec Apache pour Symfony
FROM php:7.4-apache

# Installation des extensions PHP nécessaires pour Symfony
RUN docker-php-ext-install pdo_mysql

# Configuration d'Apache pour Symfony
RUN a2enmod rewrite

# Copie du code source Symfony dans l'image
COPY . /var/www/html

# Définition du répertoire de travail
WORKDIR /var/www/html

# Exposition du port 80 pour le serveur web
EXPOSE 80

# Commande de démarrage pour exécuter Symfony
CMD ["apache2-foreground"]
