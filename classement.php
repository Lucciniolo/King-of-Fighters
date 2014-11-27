<?php include("header.php"); ?>

<?php
// On récupère la saison maximum
$maxSaison = saisonMaximum();

// On récupere la dernière journée de la dernière saison
$maxJournee = journeeMaximum($maxSaison);
if($bdd == True)
{
    // Si la connexion a réussi
    $requete = "SELECT Pseudo, position, image FROM positions,joueurs WHERE positions.joueur = joueurs.id AND saison=$maxSaison AND journee=$maxJournee ORDER BY position ASC";
    $resultat = mysqli_query($bdd, $requete);
}
else // Mais si elle rate…
{
    echo 'Erreur, de connexion à la base de données'; // On affiche un message d'erreur.
}
    echo '<table border class="table">';

?>
    Voici le classement de la journée <?php echo $maxJournee;  ?> de la saison <?php echo $maxSaison;  ?> :
<?php
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
    echo "</table>";

mysqli_free_result($resultat);
?>


<?php include("footer.php"); ?>