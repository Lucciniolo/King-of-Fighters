<?php include("header.php"); ?>

<?php

$resultat = mysqli_query($bdd, 'SELECT max(saison), max(journee) FROM positions');
while($donnees = mysqli_fetch_assoc($resultat))
{
  $maxSaison = $donnees['max(saison)'];
  echo "\n";
  $maxJournee = $donnees['max(journee)'];
}
mysqli_free_result($resultat);
?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Tournois King Of Fighters</h1>
        <p>Bienvenur sur T-KOF, site de gestionde tournoi de King Of Fighters en ligne. Nous sommes actuellement à la journée <?php echo $maxJournee;  ?> de la saison <?php echo $maxSaison;  ?>. N'hésitez pas à vous inscrire pour rejoindre les combats.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">En savoir plus &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Classement actuel</h2>
          <p>Vous voulez savoir qui est en tête ? Quels sont les joueurs les plus talentueux ? C'est la page parfaite. Le classement de la saison en cours.</p>
          <p><a class="btn btn-default" href="#" role="button">Le voir &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Liste des combattants</h2>
          <p>Venez voir qui à eu le courage de s'inscrire à notre tournoi. Vous pouvez également chercher un joueur par son nom</p>
          <p><a class="btn btn-default" href="#" role="button">Les voir &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>S'inscrire</h2>
          <p>Vous avez le cran de vous confronter aux meilleurs ? Très bien. Vous êtes à deux pas de les affronter ...</p>
          <p><a class="btn btn-default" href="#" role="button">S'inscrire &raquo;</a></p>
        </div>
      </div>

  
<?php include("footer.php"); ?>