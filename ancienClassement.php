<?php include("header.php");
// Voir documentation doc/anciensClassements.md

 ?>
<div class="container">

<br>
<br>
<br>
<?php

// Si la connexion a réussi
if($bdd == True)
{
    // On récupère la saison max
	$maxSaison = saisonMaximum();

  // Récupère dans la table "position" toutes les saisons passées. N'affiche donc pas la saison actuelle (strictement inférieur)
	$resultat = mysqli_query($bdd, "SELECT DISTINCT saison FROM positions WHERE saison < $maxSaison ");


}
else // Mais si elle rate…
{
    echo 'Erreur, de connexion à la base de données'; // On affiche un message d'erreur.
}


 ?>
	<p>Veuiller choisir une saison pour voir les classements de chaque journée<p>
      

      <form role="form" action="ancienClassement.php" method="GET">
        <div class="form-group">
          <label for="sel1">Choisir une saison : </label>
          <select class="form-control" name="saisonChoisie">
		   <?php while($donnees = mysqli_fetch_assoc($resultat))
			{
				echo "<option>".$donnees['saison']."</option>";
			} ?>            

          </select>
          <br>
 		<?php mysqli_free_result($resultat); ?>        
        </div>
      <button type="submit" class="btn btn-success">Voir le classement</button>
      </form>

      <?php if (isset($_GET['saisonChoisie']))
      {
      	echo "Voici le classement de la saison ".$_GET['saisonChoisie'];
      } ?>

</div>
<?php 
include("footer.php"); ?>