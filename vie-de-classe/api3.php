<?php 

$bdd = mysqli_connect('localhost', 'root', '', 'nouveaux-joueurs');

if($bdd == True)
{
  echo "Connexion réussie : Bienvenue Mr Bond</br>";
}
else
{
   echo "Padbol";
}

//=====================================
// Cette fonction recherche les infos sur le joueur et retourne un tableau
	
	function trouverBloc($id, $page)
	{
		$recherche = preg_match_all("/{(([^{}]|(?R))*)}/x", $page, $regs);

		$infosJoueurs = $regs[1];
		return $infosJoueurs;
	}

//=====================================
// Cette fonction retourne les prénoms des joueurs en analysant le tableau infosJoueurs de la fonction précédente
	
	function retournerPrenom($bloc)
	{
		$recherche = preg_match('/prenom": "(.*)"/', $bloc, $regs);

		$data = $regs[1];
		return $data;
	}

//=====================================
// Cette fonction retourne les pseudos des joueurs

	function retournerPseudo($bloc)
	{
		$recherche = preg_match('/Pseudo": "(.*)"/', $bloc, $regs);

		$data = $regs[1];
		return $data;
	}

//=====================================
// Cette fonction récupère les blocs, récupère le pseudo et le prénom du joueur et l'inscrit dans la base de données

	function enregistrerBloc($i, $page)
	{
		global $bdd;

		$blocs = trouverBloc(1, $page);
		
		$prenoms = retournerPrenom($blocs[$i]);

		$pseudos = retournerPseudo($blocs[$i]);

		$ecrire = mysqli_query($bdd, "INSERT INTO joueurs (pseudo, prenom) VALUES ('".$pseudos."','".$prenoms."')");
	
		if($ecrire)
		{
			echo $i."/ Joueur inscrit avec succès<br/>";
		}
	}

	$page = "";

//=====================================
// Ouvre le fichier JSON
	
	$fp = fopen("nouveaux-joueurs.json", "r");

//=====================================
// on parcourt les lignes
	
	while(!feof($fp))
	{
		$page .= fgets($fp, 4096);	// lecture du contenu de la ligne
	}

//=====================================
// Pour chaque valeur du tableau InfoJoueurs, on appelle la fonction enregistrerBloc

	for($i = 0 ; $i < count(trouverBloc(1, $page)) ; $i++)
	{
		enregistrerBloc($i, $page);
	}

//=====================================
// Bye !

	fclose($fp);

?>

