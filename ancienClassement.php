<?php include("header.php");
// Voir documentation doc/anciensClassements.md

 ?>
<div class="container">

<br>
<br>
<br>
<?php

// Si la connexion a réussie
if($bdd == True)
{
    // On récupère la saison max
	$maxSaison = saisonMaximum();

  // Récupère dans la table "position" toutes les saisons passées. N'affiche donc pas la saison actuelle (strictement inférieur)
	$resultat = mysqli_query($bdd, "SELECT DISTINCT saison FROM positions ORDER BY saison");


}
// Mais si elle rate…
else 
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

      //si une saison a été choisie...
      <?php if (isset($_GET['saisonChoisie']))
      {
        //on l'enregistre dans une variable
      	$season = $_GET['saisonChoisie'];
        $days = mysqli_query($bdd, "SELECT DISTINCT journee FROM positions WHERE saison = $season ORDER BY journee");//nouvelle requête pour obtenir les journées correspondant à la saison sélectionnée
               
          //boucle sur les journées de la saison sélectionnée
          while($myDays = mysqli_fetch_assoc($days)) 
          {
            //on enregistre la journée courante de la boucle dans une variable
            $myDay = $myDays['journee'];

            //on fait une nouvelle requete pour la journée courante de la bouche et la saison
            $resultat = mysqli_query($bdd, "SELECT positions.position, positions.journee, positions.saison, joueurs.Pseudo, joueurs.image
                                            FROM positions 
                                            INNER JOIN joueurs ON positions.joueur = joueurs.id
                                            WHERE positions.journee =  $myDay AND positions.saison = $season
                                            ORDER BY position");

            afficherTableau($season, $myDay, $resultat);

            mysqli_free_result($resultat);

          }

      } ?>

<?php 
include("footer.php"); ?>
</div>
