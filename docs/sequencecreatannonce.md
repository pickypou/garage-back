sequenceDiagram
    participant Admin/Employés
    participant HTML/twig
    participant PHP/Symfony
    participant API
    participant BDD
    
    Admin/Employés ->> HTML/twig: Entrée sur le site
    HTML/twig ->> PHP/Symfony: Requête SQL
    PHP/Symfony ->> API: Envoie les données
    API ->> BDD: Envoie les données
    BDD ->> API: Récupérer les données
    API -->> PHP/Symfony: Données récupérées
    PHP/Symfony ->> HTML/twig: 
    HTML/twig ->> Admin/Employés: Affichage de l'annonce
    
    Admin/Employés ->> HTML/twig: Ajout des options
    HTML/twig ->> PHP/Symfony: Requête SQL
    PHP/Symfony ->> API: Envoie les données
    API ->> BDD: Envoie les données
    BDD ->> API: Récupérer les données
    API -->> PHP/Symfony: Données récupérées
    PHP/Symfony ->> HTML/twig: 
    HTML/twig ->> Admin/Employés: Affichage de l'annonce avec les options