# sequence

## sequence création d'annonces

``` mermaid
sequenceDiagram
    actor Admin/Employés
    participant HTML/Twig
    participant PHP/Symfony
    participant API
    participant BDD
    
    Admin/Employés ->> HTML/Twig: Entrée sur le site
    HTML/Twig ->> PHP/Symfony: Requête SQL
    PHP/Symfony ->> API: Envoie les données
    API ->> BDD: Envoie les données
    BDD ->> API: Récupérer les données
    API -->> PHP/Symfony: Données récupérées
    PHP/Symfony ->> HTML/Twig: 
    HTML/Twig ->> Admin/Employés: Affichage de l'annonce
    
    Admin/Employés ->> HTML/Twig: Ajout des options
    HTML/Twig ->> PHP/Symfony: Requête SQL
    PHP/Symfony ->> API: Envoie les données
    API ->> BDD: Envoie les données
    BDD ->> API: Récupérer les données
    API -->> PHP/Symfony: Données récupérées
    PHP/Symfony ->> HTML/Twig: 
    HTML/Twig ->> Admin/Employés: Affichage de l'annonce avec les options
```
