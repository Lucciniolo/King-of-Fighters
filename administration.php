<?php
	include("header.php"); 

?>
	<div class="container" style="top:10px">
	<h1>Bienvenue sur la page d'administration</h1>
	<h2>Choisir un joueur vedette</h2>
	<p>Permet de mettre en avant un des dix premiers joueurs de la saison sur la page d'accueil</p>

<?php
	global $bdd;
	$requete = "SELECT Pseudo FROM joueurs, positions WHERE id=joueur AND journee = LIMIT 10";
	$resultat = mysqli_query($bdd, $requete);

?>

<form action="administration.php" method="POST">
<select>
	<?php while($donnees = mysqli_fetch_assoc($resultat))
	
	{
		echo '<option value="pseudo">'.$donnees['Pseudo'].'</option>';
	}

	?>

</select>

<form action="administration.php" method="POST">
<select>
	<?php while($donnees = mysqli_fetch_assoc($resultat))
		{
			echo '<option value="pseudo">'.$donnees['Pseudo'].'</option>';
		}
	?>
</form>

</select>

<input text="salut" type="submit">
</form>


<?php

	if(estConnecte() == "superadmin")
	{
		?>
		<hr>
			<h2>Page d'accueil</h2>
			<p>Modifier le texte de la page d'accueil</p>
			<form method='POST' action'administration.php'>
				<textarea name='textAccueil'><?php echo messageAccueil(); ?></textarea>
				<input type='submit' name='submit' value='Valider'>
			</form>"
		<?php

		if(isset($_POST['textAccueil']))
		{
			modifierAccueil($_POST['textAccueil']);
		}

		echo"<hr>
			<h2>Gérer les autorisations</h2>
			<p>Permet de sélectionner les administrateurs. Les administrateurs peuvent supprimer des joueurs.</p>";
		
		afficherJoueursAdmin();
	}
?>
<!-- TinyMCE -->
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

<?php include("footer.php"); ?>