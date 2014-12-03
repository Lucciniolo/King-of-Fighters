// Contient les fonctions utiles à notre application

<?php 
// 1. Creer une nouvelle journée
// 2. Copie colle la journée journee-1 dans la journée journee
 /*function nouvelleJournee($journee){
 	global $classement;
 	foreach ($classement as $c => $k) {
 		$classement[$c][$journee] = $classement[$c][$journee-1];
	}	
}*/


function nouvelleJournee()
{
	//1. ajouter une nouvelle journée à la table journees
		//function maxSaison(), function maxJournee
		//requête INSERT INTO journees(date,saison,journee) VALUES (date en paramètre,maxSaison(),maxjournee + 1)
		//prévoir un formulaire permettant de déterminer si la nouvelle journée fait partie de la saison en cours ou si elle est la première journée d'une nouvelle saison
		//si un tel formulaire existe, les 3 valeurs peuvent être passées en paramètres
	
	
	
	//2. ajouter une nouvelle journée à la table positions
	//a. pour chaque joueur => nouvelle journée... 
	//b. ...avec position = position de la dernière journée
	//si formulaire ci-dessus, nous pouvons passer en paramètre la saison et la journée
	//il faut malgré tout faire une requête préalable SELECT joueur, position FROM positions WHERE saison = $maxSaison AND journee = $maxJournee
	//boucle sur le résultat. à chaque boucle INSERT INTO positions (joueur, position, journee, saison) VALUES ($donnees['joueur'], $donnees['position'], journee en paramètre, saison en paramètre)
		
	
	
	
}


/* Affiche le tableau des scores de la journée $journee
function afficherTableau($journee){
 	global $classement;
?>
	<TABLE BORDER="1">
	<CAPTION> Journée <?php echo $journee;?></CAPTION>
	<TR>
	<?php 
	foreach ($classement as $c => $k) { ?>
 		<TH><?php echo $classement[$c][$journee]; ?></TH>
	<?php } ?>
	</TR>

	<TR>
	<?php 
	foreach ($classement as $c => $k) { ?>
 		<TH><?php echo $c; ?></TH>
	<?php } ?>
	</TR>

	<?php
}
*/

//affichage du classement des joueurs - paramètres : une saison, une journée, le résultat de la requête pour la journée demandée
function afficherTableau($saison, $journee, $resultat)
{

	
	//echo(mysqli_num_rows($resultat));
	echo "<table class='table'>";
    echo "<caption>Classement de la journée " . $journee . ", saison " . $saison. "</caption>";
    echo "<tr><th>Position</th><th>Pseudo</th><th>Image</th></tr>";
    
         
         while($donnees = mysqli_fetch_assoc($resultat))
            {
                echo "<tr>";
                
                echo "<td>";
                echo $donnees['position'];
                echo "</td>";
                
                echo "<td>";
                echo $donnees['Pseudo'];
                echo "</td>";

                echo "<td>";
                echo "<img src='" . $donnees['image'] ."' alt='" . $donnees['Pseudo'] . "'>";
                echo "</td>";
                               
                echo "</tr>";
            }
  
	echo "</table>";
}

// Création de l'algo de changement de position qui se calque sur l'exemple ci dessous
function changerPosition($journee, $joueur1, $joueur2){
 	global $classement;
	$positionJoueurTampon = $classement[$joueur1][$journee];
	$classement[$joueur1][$journee] = $classement[$joueur2][$journee];
	$classement[$joueur2][$journee] = $positionJoueurTampon;
}

// renvoie la saion maximum
function saisonMaximum(){
 	// On va récupreer la journée Maximum de la dernière saison 
	global $bdd;
	// On récupère la saison maximum
	$rMaxSaison = mysqli_query($bdd, 'SELECT max(saison) FROM positions');
	$donnees = mysqli_fetch_assoc($rMaxSaison);
	$maxSaison = $donnees['max(saison)'];
	mysqli_free_result($rMaxSaison);

	return $maxSaison;
}

// renvoie la journée maximum d'une saison
function journeeMaximum($maxSaison){
 	// On va récupreer la journée Maximum de la dernière saison 
	global $bdd;
	$rMaxJournee = mysqli_query($bdd, "SELECT max(journee) FROM positions where saison=$maxSaison");
	$donnees = mysqli_fetch_assoc($rMaxJournee);
	$maxJournee = $donnees['max(journee)'];
	mysqli_free_result($rMaxJournee);
	
	return $maxJournee;
}

 ?>
