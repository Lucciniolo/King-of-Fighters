# Documentation de la page classement actuel

Cette page permet d'afficher le classement de la saison actuelle, avec les positions des joueurs.

## Récupération des données de notre base de données dans phpmyadmin

Nous récupérons notre base de données grâce à la page header.php.

Nous allons également vérifier si elle se connecte bien :
if($bdd == True)
{
}
	else // Mais si elle rate…
	{
    echo 'Erreur, de connexion à la base de données'; // On affiche un message d'erreur.
}


## Récupération des variables nécessaires à l'affichage de notre tableau :

Nous allons dans un premier temps récupérer la saison maximum afin de n'afficher que la saison actuelle.

Pour faire ceci, nous aurons recours à cette variable : " $maxSaison " dont on va récupérer la valeur grace a la fonction " saisonMaximum() "

## Requête SQL permettant l'affichage des données demandées

$requete = "SELECT Pseudo, position, image FROM positions,joueurs WHERE positions.joueur = joueurs.id AND saison=$maxSaison AND journee=$maxJournee ORDER BY position ASC";

Cette requête affichera donc notre liste de pseudonyme avec leur position et leur image dans un ordre croissant.

## Affichage de notre tableau

Nous demandons d'afficher dans une boucle WHILE nos données dans l'ordre suivant : Position, Image, Pseudo.

		 echo ' <th>Position</th> <th>Image</th> <th>Pseudo</th>';
         while($donnees = mysqli_fetch_assoc($resultat))
            {
                    echo "<tr>";
                echo "<td>";
                echo $donnees['position'];
                echo "</td>";
                echo "<td>";
                echo '<img src="'.$donnees['image'].'" alt="'.$donnees['Pseudo'].'">';
                echo "</td>";
                echo"<br/>";
                
                echo "<td>";
                echo $donnees['Pseudo'];
                echo "</td>";
                echo"<br/>";
                    echo "</tr>";
            }
