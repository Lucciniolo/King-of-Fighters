<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Réponses EXAM PHP - MySQL</title>
  </head>
  <body>
    <h2>Exercice 1</h2>
    <?php 
    	// Saisir ici votre réponse
     ?>

    <h2>Question 2 : test de validation</h2>
	    <?php 
			$url = "http:///www.cava.fr";

			// Modifier true
			if(true)
			  echo "URL Valide";
			else
			  echo "URL non valide";
	    ?>

	<h2>Question 3 : Corriger les erreurs</h2>
	<?php 
    	/* $bdd = mysqli_connect('compte','localhost', 'motdepasse', 'kof');	

		requete = 'SELECT position, pseudo, image FROM positions'
    	
    	$resultat = mysqli_query($requete);

    	echo "<tr><th>Position</th><th>Pseudo</th><th>Image</th></tr>";
    	while($donnees = mysqli_fetch_assoc($requete))
        {
        	echo "<tr>";
           
            echo "<td>";
            echo $donnees['Pseudo'];
            echo "</td>";
            
            echo "<td>";
            echo $donnees['position'];
            echo "</td>";
            echo "<td>";
            echo "<img src='" . $donnees['image'] ."' alt='" . $donnees['Pseudo'] . "'>";
            echo "</td>";
                          
            echo "</tr>";
       	}
       	mysqli_free_result($resultat); */
	 ?>

	<h2>Exercice 4 - Quelques requêtes SQL</h2>

	Ecrire les requetes en HTML. Exemple : 
	<br>
	SELECT * from joueurs.
	<br>
	<strong>Requête 1 : </strong>
	<br>
	<strong>Requête 2 : </strong>
	<br>
	<strong>Requête 3 : </strong>

	<h2>Exercice 5 - Questions de cours</h2>

	Ecrire vos réponses directement en HTML.
	<br>
	<strong>Question 1 : </strong>
	<br>
	<strong>Question 2 : </strong>
	<br>
	<strong>Question 3 : </strong>
	<br>
	<strong>Question 4 : </strong>
	<br>

    <h2>Exercice 6 - Test d'entretien</h2>
    <?php 
    	// Saisir ici votre réponse
     ?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  
  </body>
</html>