<?php 
// 1. Creer une nouvelle journée
// 2. Copie colle la journée journee-1 dans la journée journee
 /*function nouvelleJournee($journee){
 	global $classement;
 	foreach ($classement as $c => $k) {
 		$classement[$c][$journee] = $classement[$c][$journee-1];
	}	
}*/
	function afficherJoueursAdmin()
	{
		global $bdd;

		$players = mysqli_query($bdd, 'SELECT prenom, nom, image, id, type FROM joueurs LIMIT 1,20');

		echo "<table class='table table-condensed table-striped'>";
		echo "<tr><th>Choisir</th><th>Statut actuel</th><th>Prénom</th><th>Nom</th><th></th></tr>";

		while($data = mysqli_fetch_assoc($players))
		{
			echo "<tr>";
			echo "<td>
					<form action='administration.php' method='POST'>
						".$data['id']."
						<select>
						<option value='type'>lambda</option>
					 	<option value='type'>admin</option>
						</select>
						<input type='submit' value='Assigner'>
					</form>
				  </td>";
			echo "<td>".$data['type']."</td>";
			echo "<td>".$data['prenom']."</td>";
			echo "<td>".$data['nom']."</td>";
			echo "<td>"."<img src='".strip_tags($data['image'])."'/>"."</td>";
			echo "</tr>";
		}

		echo "</table>";
	}

		function modifierType($type, $id)
	{
		global $bdd;

		$modifier = mysqli_query($bdd, 'UPDATE joueurs SET type = $type WHERE id = $id');
	
		if($del)
		{
			echo "<div class='alert alert-success' role='alert'>Joueur modifié avec succès</div>";
		}

	}

	// Cette fonction renvoie le message qui est affiché sur la page d'accueil. 
	// Elle va le chercher dans la table MESSAGES de la base de données.
	function messageAccueil(){
		  global $bdd;

          $txtAccueil = mysqli_query($bdd, 'SELECT texte FROM messages WHERE id = 1');
          $dataTxt = mysqli_fetch_assoc($txtAccueil);
          $message = $dataTxt['texte'];

		  return $message;
	}


	function modifierAccueil($texte)
	{
		global $bdd;

		$qText = 'UPDATE messages SET texte = "'.$texte.'" WHERE id = 1';

		$modifierText = mysqli_query($bdd, $qText);
	
		if($modifierText)
		{
			echo "<div class='alert alert-success' role='alert'>Message modifié avec succès</div>";
		}
	}


   function estConnecte()
    {
      if(isset($_SESSION['pseudo']))
      { 
        global $bdd;

        $qType = "SELECT type FROM joueurs WHERE Pseudo = \"". $_SESSION['pseudo'] . "\"" ;
        
        $resType = mysqli_query($bdd, $qType);

        $data = mysqli_fetch_array($resType);

        if($data['type'] == 'superadmin')
        {
          return "superadmin";
        }

        elseif($data['type'] == 'admin')
        {
          return "admin";
        }

        elseif($data['type'] == 'lambda')
        {
          return "lambda";
        }
      }
      
      else
      {
        return false;
      }

    }



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

// Inscrit dans la bdd la description que le joueur à complété
	function textPerso($texte, $id)
	{
		global $bdd; 
		$qText = 'UPDATE profils SET description = "'.$texte.'" WHERE id = '.$id;
		// echo "debug qtext : ". $qText;
		mysqli_query($bdd, $qText);
		echo "<div class='alert alert-success' role='alert'>Message modifié avec succès</div>";

	}


// Retourne la description du profil (par ex. dans le text input de la page modifier profil)
	function afficherTextPerso($id)
	{
		global $bdd;

		$getText = mysqli_query($bdd, 
			'SELECT description
			FROM profils
			WHERE id = "'.$id.'"');

		$data = mysqli_fetch_assoc($getText);
		$description = $data['description'];

		return $description;
	}

//Cette fonction génère, sauvegarde et retourne un token
//Vous pouvez lui passer en paramètre optionnel un nom pour différencier les formulaires
function generer_token($nom = '')
{
	$token = uniqid(rand(), true);
	$_SESSION[$nom.'_token'] = $token;
	$_SESSION[$nom.'_token_time'] = time();
	return $token;
}

//Cette fonction vérifie le token
//Vous passez en argument le temps de validité (en secondes)
//Le referer attendu (adresse absolue, rappelez-vous :D)
//Le nom optionnel si vous en avez défini un lors de la création du token
function verifier_token($temps, $referer, $nom = '')
{
if(isset($_SESSION[$nom.'_token']) && isset($_SESSION[$nom.'_token_time']) && isset($_POST['token']))
	if($_SESSION[$nom.'_token'] == $_POST['token'])
		if($_SESSION[$nom.'_token_time'] >= (time() - $temps)){
				// echo "Jaime tous le monde. HTTP REFERER ". $_SERVER['HTTP_REFERER'];
			if($_SERVER['HTTP_REFERER'] == $referer)
				return true;
	}
return false;
}
?>



 ?>
