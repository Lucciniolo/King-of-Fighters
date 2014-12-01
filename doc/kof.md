# Documentation kof.php

>Cette page est destinée à contenir la documentation des fonctions les plus utilisées
>qu'on incluera dans header.php. 

## fonction nouvelleJournee


1. On Crée une nouvelle journee.
2. A la table journees, on ajoute une nouvelle journee à $maxSaison(saison en cours)
3. A la table positions, on ajoute pour chaque joueur une journee à la saison en cours ($maxSaison)
4. On conserve les valeurs de positions de la journée précedente sur la nouvelle journée créee.

## fonction afficherTableau 

### Cette fonction affiche le classement des joueurs pour une journée et une saison donnée.

1. La fonction prend en paramètre une journée et une saison (la journée et la saison sélectionée)
2. On fait une requête avec une jointure entre la table position et la table joueurs dans laquelle positions.joueur = joueurs.id.
3. on crée un tableau HTML 
4. On lance une boucle qui permet de parcourir notre table jointe pour afficher la position, l'image et le pseudo.

## fonction changerPosition

### Cette fonction permet d'inverser la position de deux joueurs au terme d'un combat dans une journée donnée d'une saison donnée

1. On  récupère les 2 joueurs sélectionnés par l'utilisateur (méthode GET)
2. On lance le combat dans la dernière journée ($maxJournee)
3. On ajoute une condition  pour voir si la position du joueur gagnant de la journée en cours (crée avec nouvelleJournee) est supérieurs à celle du joueur perdant.
Si c'est le cas, rien ne se passe, sinon ils échangent leurs positions. 

## Fonction saisonMaximum

### Cette fonction permet de récupérer la saison maximum

	function saisonMaximum()
	{
		global $bdd;
		// On récupère la saison maximum
		$rMaxSaison = mysqli_query($bdd, 'SELECT max(saison) FROM positions');
		$donnees = mysqli_fetch_assoc($rMaxSaison);
		$maxSaison = $donnees['max(saison)'];
		mysqli_free_result($rMaxSaison);

		return $maxSaison;
	}


1. On fait une requête sur la BDD pour connaitre la saison MAX de la table positions
2. On stocke le resulat de la requete dans une variable 
3. On retourne la saison max 


## fonction journeeMaximum

### Cette fonction permet de récupérer la journée maximum d'une saison

	function journeeMaximum($maxSaison){
 	// On va récupreer la journée Maximum de la dernière saison 
	global $bdd;
	$rMaxJournee = mysqli_query($bdd, "SELECT max(journee) FROM positions where saison=$maxSaison");
	$donnees = mysqli_fetch_assoc($rMaxJournee);
	$maxJournee = $donnees['max(journee)'];
	mysqli_free_result($rMaxJournee);
	
	return $maxJournee;
	}


1. La fonction prend en paramètre la saison maximum
2. On fait une requête sur la BDD pour connaitre la journee MAX de la saison max de la table positions
3. On stocke le **resultat** de la requete dans une variable 
4. On retourne la journee max 
