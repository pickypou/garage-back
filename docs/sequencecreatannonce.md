# sequence

## sequence création d'annonces

``` mermaid 
sequenceDiagram
    participant AdminEmployés
    participant HTMLTwig
    participant PHPSymfony
    participant API
    participant BDD
    
    AdminEmployés ->> HTMLTwig: Entrée sur le site
    HTMLTwig ->> PHPSymfony: Requête SQL
    PHPSymfony ->> API: Envoie les données
    API ->> BDD: Envoie les données
    BDD ->> API: Récupérer les données
    API -->> PHPSymfony: Données récupérées
    PHPSymfony ->> HTMLTwig: 
    HTMLTwig ->> AdminEmployés: Affichage de l'annonce
    
    AdminEmployés ->> HTMLTwig: Ajout des options
    HTMLTwig ->> PHPSymfony: Requête SQL
    PHP/Symfony ->> API: Envoie les données
    API ->> BDD: Envoie les données
    BDD ->> API: Récupérer les données
    API -->> PHPSymfony: Données récupérées
    PHPSymfony ->> HTMLTwig: 
    HTMLTwig ->> AdminEmployés: Affichage de l'annonce avec les options
```
