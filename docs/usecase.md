# Cas d'utilisation

``` mermaid
    flowchart LR
        adm((Administrateurs))
        emp((Employés))

        subgraph Espace admin
            cnx(Connexion)
            va(Voir les annonces)
            ca(Créer une annonce)
            sa(Supprimer une annonce)
            ccpt(Créer un compte)
            sc(Supprimer un commentaire)
        end

        emp --> cnx
        emp --> va
        emp --> ca
        emp --> sa

        adm --> cnx
        adm --> cnx
        adm --> va
        adm --> ca
        adm --> sa
        adm --> ccpt
        adm --> sc
```
