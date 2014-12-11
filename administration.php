<?php
if (isset($_POST['pseudo'])) {
	 // Ecriture d'un cookie
	 setcookie('pseudo', $_POST['pseudo'], time() + 10*24*3600, null, null, false, true);
}
 include("header.php"); ?>

<h1>Bienvenue sur la page d'administration</h1>

<h2>Choisir un joueur vedette</h2>
<p>Permet de mettre en avant un des dix premiers joueurs de la saison sur la page d'accueil</p>
<?php 

$requete = "SELECT Pseudo FROM joueurs, positions WHERE id=joueur AND journee =  LIMIT 10";
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
</select>



<input text="salut" type="submit">
</form>






<?php 



?>

<?php include("footer.php"); ?>