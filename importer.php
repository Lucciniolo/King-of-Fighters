<?php 
/* 
Développé par AMARI Sofiane
WF3 Février 2014

Importe une liste de joueurs d'un document JSON dans la base de données MySQL du projet T-KOF.

*/
$page ="";
$fichier = "nouveaux-joueurs.json";

// Connexion à la base de données
function connexionBD()
{

}

// Ouverture du fichier
// Ecriture du contenu dans global $page
function ouvrirFichier()
{
	global $page;
	// On ouvre le fichier en lecture.
	$fp = fopen("$ ","r");
	//on parcourt toutes les lignes.
	while (!feof($fp)) { 
		// lecture du contenu de la ligne 
		// (4096 est le nombre d'octet maximum lit sur la ligne)
		// On l'insère dans la string $page.
	 	$page .= fgets($fp, 4096); 
	}
}

// {(\n.*\n  )}
// ,\n  {(\n    ".*)},\n  {\n
// Récupèrera le premier bloc entre crochets
// coder une expression régulière. La fonction trouver-bloc("1") 
//doit renvoyer simplement le premier bloc (donc les données d'un joueur).
function trouver_bloc($numero)
{
	global $page;
	$blocs = array();
	preg_match("/{([^}]+)}/", $page, $blocs, PREG_OFFSET_CAPTURE);
	//preg_match("{([^}]+)}", $subject, $matches, PREG_OFFSET_CAPTURE

	// $bloc ='"nom": "Helena",
	// 	    "prenom": "Cochran",
	// 	    "Pseudo": "Rivas",
	// 	    "image": "http://placehold.it/32x32",
	// 	    "mdp": 22,
	// 	    "date": "2014-04-20",
	// 	    "type": "female",
	// 	    "donneType": "admin"';
  	print $page;
  	print_r($blocs);
//	return $blocs[0];
}

function retourner_info($element, $bloc)
{
	return "Rivas";
}

// Enregistre le bloc numero $numero;
function enregistrer_bloc($j)
{
	// Si l'enregistrement à fonctionner on retourne true et on l'affiche.
	echo "Utilisateur au Pseudo". retourner_info("Pseudo", trouver_bloc(5))  ." 
		  inscris avec succès dans la base de données. <br>";
    return true;
}

function importer()
{
	for ($i=0; $i < 100 ; $i++){
		if(!enregistrer_bloc($i))
			false;
	}
	return true;
}

// Corps du script

// On se connecte à la base.
connexionBD();
// On lance l'importation.
// if(importer())
	//echo "Importation réussie";



// On isole les blocs à l'aide d'une expression régulière.
// On stock les blocs dans blocs.

// Pour voir le bloc numero 1
//echo $blocs[1];

//fclose($fp);
ouvrirFichier();
echo trouver_bloc(5);
?>