<?php include("header.php"); 

echo "<br><br><br><br><br>";
if( isset($_POST['pseudo']) AND
	isset($_POST['motDePasse'])){

	// echo "DEBUG : L'utilisateur : ". $_POST['pseudo'] . " a essayé de se connecter avec le mot de passe ". $_POST['motDePasse'];

	// On récupère pour un utilisateur donné, dans la base de données, son mot de passe.
	$requete = "SELECT mdp FROM joueurs WHERE Pseudo = \"". $_POST['pseudo'] . "\"" ;

	// echo "Requete : ". $requete;
	$resultat = mysqli_query($bdd, $requete);
	// echo "DEBUG RESULTAT : ". print_r($resultat);
	if($resultat){
		$donnees = mysqli_fetch_array($resultat);
		$motDePasse = $donnees['mdp'];
		// echo "DEBUG : le mot de passe récupéré dans la base est : ". $motDePasse;
	}
	else
		echo "<br>Pas d'utilisateur avec le nom : ". $_POST['pseudo'];


	if($_POST['motDePasse'] != $motDePasse)
		echo "<br><br>mauvais couple identifiant/mot de passe.";
	else
		echo "<br><br>Bienvenue à ". $_POST['pseudo'] . " qui s'est <b> connecté avec succès </b>";

}

?>

// A n'afficher que si la variable de session "UTILISATEUR" n'existe pas.

<h1>Bienvenue sur la page de connexion</h1>

<form action="exoConnexion.php" method="POST" e>
	<input type="text" name="pseudo">
	<input type="password" name="motDePasse">
	<input type="submit" value="kalider">
</form>

<?php include("footer.php"); ?>