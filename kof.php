// Contient les fonctions utiles à notre application

<?php 
// 1. Creer une nouvelle journée
// 2. Copie colle la journée journee-1 dans la journée journee
 function nouvelleJournee($journee){
 	global $classement;
 	foreach ($classement as $c => $k) {
 		$classement[$c][$journee] = $classement[$c][$journee-1];
	}	
}

// Affiche le tableau des scores de la journée $journee
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