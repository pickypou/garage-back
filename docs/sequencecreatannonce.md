# Sequences création annonces

## La création d'une annonce

``` mermaid
sequenceDiagram
    actor Admin/Employés
    partcipant HTML/twig
    participant PHP/Symfony
    participant API
    participant BDD
    Admin/employés ->> HTML/twig: Entrée sur le site
    HTML/twig ->> PHP/Symfony: requette SQL
    PHP/Symfony ->> API: Envois les données
    API ->> BDD: envois le données
    BDD ->> API: Récupérer les données
    API -->> PHP/symfony:
    PHP/symfony ->> HTML/twig: 
    Html/twig ->> Adlin/employés: affichage de l'annonce
     Admin/employés ->> HTML/twig: ajout des options
    HTML/twig ->> PHP/Symfony: requette SQL
    PHP/Symfony ->> API: Envois les données
    API ->> BDD: envois le données
    BDD ->> API: Récupérer les données
    API -->> PHP/symfony:
    PHP/symfony ->> HTML/twig: 
    Html/twig ->> Adlin/employés: affichage de l'annonce avec les options
```
