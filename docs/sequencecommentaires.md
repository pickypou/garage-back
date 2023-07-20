# sequence commentaires

## sequence d' un commentaire

``` mermaid
sequenceDiagram
    actor Admin
    participant HTML/Twig
    participant PHP/Symfony
    participant API
    participant BDD

    Admin ->> HTML/Twig: Entré sur le site
    HTML/Twig ->> PHP/Symfony: requette
    PHP/Symfony ->> API: récupération des données
    API ->> BDD: Récupérer les données
    BDD -->> API: retour des données
    API -->> PHP/Symfony:  
    PHP/Symfony -->> HTML/Twig: 
    HTML/Twig ->> Admin: affichage des commentaires

     Admin ->> HTML/Twig: Entré sur le site
    HTML/Twig ->> PHP/Symfony: requette
    PHP/Symfony ->> API: supprimer le commentaire
    API ->> BDD: supprimer les données
    BDD -->> API: 
    API -->> PHP/Symfony:  
    PHP/Symfony -->> HTML/Twig: 
    HTML/Twig ->> Admin: commentaires supprimer

```
