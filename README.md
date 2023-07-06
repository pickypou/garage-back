# Garage V. Parrot

- lien du projet: https://github.com/pickypou/garage-back.git

### En local

-git clone https://github.com/pickypou/garage-back.git

- ce rendre a la racine du projet
- faire:
- composer install
- symfony console doctrine:database:create
- symfony console doctrine:migrations;migrate
- symfony serve

### Création d'un administrateur

- crée un utilisateur

- dans la base de donées

sur la colonne roles entré ["ROLE_ADMIN"]

