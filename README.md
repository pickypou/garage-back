
# Garage V. Parrot

## Description du projet

Le projet se concentre sur le développement de la partie back-end d'une application dédiée à la vente de véhicules d'occasion. L'objectif principal est de permettre la création d'annonces pour les véhicules disponibles à la vente. Cependant, l'accès à cette partie de l'application est limité à monsieur PARROT, le propriétaire de l'entreprise, ainsi qu'à ses employés.

Seul monsieur PARROT dispose des autorisations nécessaires pour créer et supprimer des comptes pour ses employés. Chaque employé dispose d'un compte qui lui permet de se connecter à l'application et de créer des annonces pour les véhicules disponibles dans l'inventaire de l'entreprise.

Chaque annonce comprend des informations détaillées sur le véhicule, telles que le titre de l'annonce, la marque, le modèle, l'année de mise en circulation, le kilométrage, le type de carburant et le prix. De plus, chaque annonce est accompagnée d'une liste d'options spécifiques au véhicule et d'une série de six photos pour illustrer le véhicule sous différents angles.

Pour faciliter la gestion des annonces, un système automatique génère la date de création de chaque annonce dès qu'elle est créée. De plus, chaque annonce est dotée d'une fonctionnalité de mise à jour qui permet de spécifier une date de dernière mise à jour, indiquant ainsi aux utilisateurs la fraîcheur des informations fournies.

Ce projet vise à fournir une plateforme sécurisée et conviviale pour la gestion des annonces de véhicules d'occasion. Il permet à monsieur PARROT et à ses employés d'opérer efficacement dans le processus de vente de véhicules, en offrant aux clients des informations précises et à jour sur les véhicules disponibles.

## technologie utilisé

Le projet Garage V. Parrot est une application de vente de véhicules d'occasion. Cette application back-end est développée avec Symfony 6.3 et utilise API Platform pour gérer l'API. Le CSS est géré via Bootstrap 5.

## Pourquoi ?

Symfony :

Framework puissant et mature : Symfony est un framework PHP robuste et bien établi, avec une vaste communauté de développeurs et de nombreuses ressources disponibles.
Architecture MVC : Symfony suit l'architecture Modèle-Vue-Contrôleur (MVC), ce qui facilite la séparation des préoccupations et la structuration de votre application.
Composants réutilisables : Symfony est basé sur un ensemble de composants réutilisables, ce qui permet de gagner du temps et de l'effort en utilisant des fonctionnalités préconstruites.
Documentation complète : Symfony dispose d'une documentation complète et détaillée, ce qui facilite l'apprentissage et le développement dans le framework.

Plate-forme API :

Création rapide d'API REST : API Platform simplifie la création d'API REST complète en fournissant des outils et des fonctionnalités prêts à l'emploi.
Gestion des ressources : API Platform facilite la définition et la gestion des ressources de l'API, ainsi que les opérations CRUD (Create, Read, Update, Delete).
Formats de données flexibles : API Platform prend en charge plusieurs formats de données, tels que JSON-LD, JSON, XML, YAML, ce qui permet une intégration facile avec différents clients.
Documentation automatique : API Platform a généré automatiquement une documentation interactive pour votre API, ce qui facilite la compréhension et l'utilisation par les développeurs tiers.

Bootstrap :

Conception réactive : Bootstrap offre une grille fluide et des composants prédéfinis qui modifient la création d'une interface utilisateur réactive, qui s'adapte à différents appareils et tailles d'écran.
Composants personnalisables : Bootstrap propose une large gamme de composants prêts à l'emploi, tels que des boutons, des formulaires, des modales, des carrousels, etc., qui peuvent être personnalisés en fonction de vos besoins.
Documentation complète : Bootstrap dispose d'une documentation détaillée, avec des exemples et des conseils pour vous aider à tirer le meilleur parti du framework.
Écosystème actif : Bootstrap est largement adopté et dispose d'une communauté active, ce qui signifie qu'il existe de nombreux thèmes, modèles et ressources supplémentaires disponibles pour accélérer le développement.

## GitHub

- [Lien du projet](https://github.com/pickypou/garage-back.git)

## En local

1. Cloner le dépôt :

   git clone https://github.com/pickypou/garage-back.git
  
2. Se rendre à la racine du projet :
  
   cd garage-back

3. Installer les dépendances :

   composer install

4. Créer la base de données :

   symfony console doctrine:database:create

5. Effectuer les migrations :

   symfony console doctrine:migrations:migrate

6. Lancer le serveur de développement :

   symfony serve

Assurez-vous d'avoir PHP, Symfony et Composer installés sur votre machine avant d'exécuter ces commandes.

Pour accéder à l'application, ouvrez votre navigateur et rendez-vous à l'URL indiquée par Symfony lors de l'exécution de la commande `symfony serve`.

## Création d'un administrateur

Lors de la première utilisation :

- Créez un utilisateur.

Dans la base de données :

- Dans la colonne "roles", entrez ["ROLE_ADMIN"].

Après la connexion en tant qu'administrateur, vous pouvez :

- Créer un compte pour chaque employé.
- Créer des annonces.
- Voir la liste des annonces.
- Accéder aux détails de chaque annonce.
- Supprimer une ou plusieurs annonces.

Les employés, après leur connexion, peuvent :

- Créer des annonces.
- Voir la liste des annonces.
- Accéder aux détails de chaque annonce.
- Supprimer une ou plusieurs annonces.
