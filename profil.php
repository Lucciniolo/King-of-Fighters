<?php include("header.php"); ?>

<script>

	if(window.location.href.indexOf("profil.php"))
	{
		$("a:contains('joueurs')").parent().addClass('active');
	}

</script>

<?php
		setlocale(LC_ALL, "fr_FR", "Fra");

		global $bdd;

		if(isset($_GET['id']))
		{
			$id = $_GET['id'];

			$getProfile = mysqli_query($bdd, 
				"SELECT joueurs.nom, joueurs.prenom, joueurs.Pseudo, joueurs.date_inscription, profils.description, profils.age, joueurs.image 
				FROM joueurs
				NATURAL JOIN profils
				WHERE joueurs.id = $id");

			while($data = mysqli_fetch_assoc($getProfile))
			{
				$nomJoueur = $data['prenom']." ".$data['nom'];
				$pseudoJoueur = $data['Pseudo'];
				$date = strftime('%d %B %Y', strtotime($data['date_inscription']));
				$avatar = $data['image'];
				$description = $data['description'];
				$age = $data['age'];
			}
		}
	
?>

<div class="jumbotron"style="top:10px">

	<div class="container">

		<img src= <?php echo $avatar; ?> >
		<h1> <?php echo $pseudoJoueur; ?> </h1>
		<p> <?php echo $nomJoueur; ?> </p>

	</div>

</div>

<div class="container">

		<a href="joueurs.php"><span class='glyphicon glyphicon-chevron-left'></span>Revenir à la liste des joueurs</a>
		<hr>
		<?php 
		//echo "MARCHE TOUT DROIT : /////". $_SESSION['pseudo'];
		//echo "TREEEEEE : ". $pseudoJoueur;
		//echo "rrrrr : ". estConnecte();

		if(estConnecte() != false && $pseudoJoueur == $_SESSION['pseudo']){ 
		?>
			<form action="profilUpdate.php?id=<?php echo $id; ?>" method="POST">
				<input type="hidden" name="token" value = "<?php echo generer_token('profil-update'); ?>">
				<input type="submit" name="boutton" value="Modifier mon profil">
			</form>
			<?php
		} 
		?>
		<h4>En jeu depuis : </h4> <?php echo utf8_encode($date); ?>
		<h4>Age : </h4> <?php echo $age; ?>
		<h4>Description : </h4> <?php echo $description; ?>

<?php include("footer.php"); ?>