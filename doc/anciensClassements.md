#Intéret de la page

Cette page permet de voir pour une journée donnée sélectionnée dans le SELECT de class "form-control", l'ensemble des classements pour chaque journée de la saison choisie. 

#Fonctionnement

## Les requetes SQL nécessaire

Récupèrer dans la table "position" toutes les saisons passées. N'affiche donc pas la saison actuelle (strictement inférieur)
Le SELECT DISTINCT sert à ...

##Formulaire

La saison choisie est transmise avec un GET pour plus d'informations aller voir sur la page :[manuel GET PHP](http://php.net/manual/fr/reserved.variables.get.php).

## Affichage lorsque l'on clique sur le bouton "voir le classement"

Le  if (isset($_GET['saisonChoisie']) permet de vérifier l'existance de la variable saisonChoisie transmise lorsque l'on clique sur le bouton "Voir le classement". le code contenu dans  if (isset($_GET['saisonChoisie']) ne s'affichera donc qu'après que l'on ait cliqué sur le bouton.

