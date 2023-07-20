# sequence commentaires

## sequence d' un commentaire

```mermaid
sequenceDiagram
actor Admin/Employés
    participant HTML/Twig
    participant PHP/Symfony
    participant API
    participant BDD
Utilisateur ->> HTML/Twig: entrée sur le site
HTML/Twig ->> PHP/Symfony: requet
API ->> BDD: récupérer les commentaire
BDD -->> API: 
API -->> PHP/Symfony: 
PHP/Symfony -->>HTML/Twig:
HTML/Twig ->> Utilisateur: affichage du commentaire
```