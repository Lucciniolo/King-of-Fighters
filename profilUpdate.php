<?php
/*
Développé principalement par Florent LELONG (mais ca, c'était avant.)
Sous les observations de Alexandre TIRLET
Revu par AMARI Sofiane
Adoubé par ...

Cette page sert à :
* Mettre en ligne l'image pour un utilisateur
* Changer le texte de description

Il manque :
* Systeme de pretection des modifications via
 	- POST
*/

 include("header.php"); 
$id = str_replace("'", "", $_GET['id']);
// Retire les guillemets mis par protection par PHP autour de GET sur LA PAGE "REFERER"
$adresse = "http://localhost/King-of-Fighters/profil.php?id=%27".$id."%27"; 
//echo $_SERVER['HTTP_REFERER'];echo "<br>";
// Retire les guillemets mis par protection par PHP autour de GET sur la PAGE COURANTE
$adresse2 = "http://localhost/King-of-Fighters/profilUpdate.php?id=%27".$id."%27";
// echo $adresse2;

// Le fait de gerer les formulaire interne à la page nous oblige à vérifier deux pages de provenance.
if(verifier_token(600, $adresse, 'profil-update') OR 
   verifier_token(600, $adresse2, 'profil-update'))
{
	 ?>

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


		if(isset($_POST["submit-2"]))
		{
			$target_dir = "ressources/uploads/{$pseudoJoueur}.jpg";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false)
			{
				echo "File is an image - " . $check["mime"] . " ";
				$result = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir);
				
				if($result) echo "Transfert reussi";
				
				$uploadOk = 1;

				$requete11 = 'UPDATE joueurs SET image = "'.$target_dir.'" WHERE id ='.$id;
				echo $requete11;
				$modifier = mysqli_query($bdd, $requete11);

			}
			else
			{
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}

		if(isset($_POST['textPerso']))
			{
				textPerso($_POST['textPerso'], $_GET['id']);
			}
	?>

	<div class="container">

			<h1>Modifier profil</h1>
			<form>
			<p><input name="Pseudo" value=<?php echo $pseudoJoueur; ?> ></input> </p>
			<input type="submit" name="submit-pseudo">
			</form>
			<p> <?php echo $nomJoueur." ".$id; ?> </p>
			<form action=<?php echo $adresse2 ;?> method="post" enctype="multipart/form-data">
				Choisir une image :
				<input type='file' name='fileToUpload' id='fileToUpload'>
				<input name='MAX_FILE_SIZE' size='1048576' type='hidden'>
				<input type="hidden" name="token" value='<?php echo $_POST['token']; ?>'>
				<input type='submit' value='Télécharger' name='submit-2'>
			</form>
			<hr>
			<p>Modifier le texte de présentation</p>
			<form method='POST' action= <?php echo $adresse2 ;?> >
				<textarea name='textPerso'><?php echo afficherTextPerso($id); ?></textarea>
				<input type="hidden" name="token" value='<?php echo $_POST['token']; ?>'>
				<input type='submit' name='submit' value='Valider'>
			</form>
	<?php
}
else
{
	echo "Tentavive frauduleuse.";	
}
?>

<!-- TinyMCE -->
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

<?php include("footer.php"); ?>