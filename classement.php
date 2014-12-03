<?php include("header.php"); ?>

<div class="container">

<br>
<br>
<br>

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

    afficherTableau($maxSaison, $maxJournee, $resultat);

    mysqli_free_result($resultat);
}
else // Mais si elle rate…
{
    echo 'Erreur de connexion à la base de données'; // On affiche un message d'erreur.
}
    
?>


<?php include("footer.php"); ?>

</div>