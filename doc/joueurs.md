# Intéret de la page
Cette page affiche sous forme de tableau, la liste de tous les joueurs inscrits à la base de données "joueurs".

# Fonctionnement
Il s'agit d'un affichage simple au chargement de la page et ne requiert pas d'action particulière de l'utilisateur

## Les requêtes SQL nécéssaires
Il faut récupérer dans la table "joueurs", les noms, prénoms et images des joueurs inscrits.

## Affichage du tableau
Avec le language php, utiliser "echo" pour ouvrir un tableau à 3 colonnes et utilisant les class de mise en forme de bootstrap.

La requête sql renvoie un tableau comprenant les noms, prénoms et chemin d'images.

Utiliser la boucle while qui affichera ("echo") des lignes de tableau autant que de joueurs inscrits dans la base de données.
